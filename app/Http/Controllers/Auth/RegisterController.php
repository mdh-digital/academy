<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\CheckWhatsappNumberRequest;
use App\Http\Requests\Authentication\WhatsappVerificationRequest;
use App\Models\User;
use App\Observers\User\WhatsappVerificationObserver;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $whatsappObserver;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WhatsappVerificationObserver $whatsappObserver)
    {
        $this->whatsappObserver     = $whatsappObserver;
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register', ['page' => 'Registrasi Akun Pelajar']);
    }


    /*
    |--------------------------------------------------------------------------
    | 1. Whatsapp Number Verification
    |--------------------------------------------------------------------------
    */

    // Ask Code Verification
    public function sendVerifyCode(CheckWhatsappNumberRequest $request)
    {
        $codeVerify     = substr(rand(100000, 999999), 0, 6);
        $oldData        = $this->whatsappObserver->getData($request, 'without_auth');

        if (substr($request->phone, 0, 2) != '62') {
            return response()->json([
                'message'   => 'Nomor yang anda masukan salah, nomor harus di awali 62 tanpa menggunakan tanda +. dan anda tidak perlu menambahkan 0 di awal nomor, contoh : Nomor Whatsapp anda ialah 081290645584, maka anda menginputkannya menjadi 6281290645584',
                'status'    => false,
                'type'      => '62'
            ], 200);
        }

        if (!$oldData) {
            $this->whatsappObserver->createData($request, "without_auth", $codeVerify);
        } else {
            $this->whatsappObserver->updateData($oldData, $codeVerify);
        }

        $response = $this->whatsappObserver->whatsAppNotif(array(
            'use_template'      => true,
            'template'          => env('WHATSAPP_VERIFICATION'),
            'message'           => '',
            'phone'             => $request->phone,
            'template_body'     => array(
                '{name}'                => $request->name,
                '{codeverify}'          => $codeVerify,
                '{company_name}'        => 'PasarSafe - Akademi'
            )
        ));

        if ($response->status() == 401) {
            return response()->json([
                'message'   => 'Nomor Whatsapp yang anda masukan tidak valid! silahkan periksa kembali',
                'status'    => false,
                'type'      => '401'
            ], 200);
        }


        return response()->json([
            'message'   => 'Kode Verifikasi Nomor Whatsapp Telah Kami Kirimkan Ke Nomor Whatsapp Anda',
            'status'    => true
        ], 200);
    }

    // Send Verification Whatsapp Code
    public function verify(WhatsappVerificationRequest $request)
    {
        $data = $this->whatsappObserver->verification($request);

        if ($data == null) {
            return response()->json([
                'message'   => 'Kode Verifikasi Nomor Whatsapp Anda Salah',
                'status'    => false
            ], 200);
        } else {

            if ($data->temporary_data->lt(now())) {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Kode Verifikasi telah kadaluarsa',
                ], 200);
            }

            return response()->json([
                'message'   => 'Verifikasi nomor whatsapp berhasil dilakukan',
                'status'    => true
            ], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | 2. Registration Process
    |--------------------------------------------------------------------------
    */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'phone'         => ['required', 'numeric', 'min:10'],
            'gender'        => ['required', 'in:pria,wanita']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'gender'    => $data['gender'],
            'password'  => Hash::make($data['password']),
        ]);
    }
}
