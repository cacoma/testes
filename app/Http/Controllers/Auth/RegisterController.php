<?php

namespace cacoma\Http\Controllers\Auth;

use cacoma\User;
use cacoma\City;
use Carbon\Carbon;
use cacoma\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {	
		//$data['birthdate'] = Carbon::parse($data['birthdate']);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'sex' => 'required|string|min:1',
            'birthdate' => 'date_format:d/m/Y|required',
            'etnia' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'uf' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
			'optradio' => 'in:S',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \cacoma\User
     */
    protected function create(array $data)
    {
		$defaultid = 2;
		//$birthDateDB = Carbon::parse($data['birthdate']);
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'sex' => $data['sex'],
            'birthdate' => Carbon::createFromFormat('d/m/Y',$data['birthdate']),
            'etnia' => $data['etnia'],
            'estado_civil' => $data['estado_civil'],
            'cidade' => $data['cidade'],
            'uf' => $data['uf'],
            'pais' => $data['pais'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'role_id' => $defaultid,
        ]);
    }
	/*
	public function autocomplete(Request $request)
    {
        $term=$request->term;
        //$data = stationary::where('item','LIKE','%'.$term.'%')
		$data = cacoma\City::where('name','LIKE','%'.$term.'%')
        ->take(10)
        ->get();
        $results=array();
		dd($data);
        foreach ($data as $key => $v){
		$result[]=['value' =>$v->item];
        }
        return response()->json($results);
	}

	public function index(){
        return view('autocomplete.index');
   }

    public function autoComplete(Request $request) {

		$query = $request->get('term','');

        $cities=City::where('name','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach ($cities as $city) {
                $data[]=array('value'=>$city->name,'id'=>$city->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
	*/
    public function layout()
    {
    	return view('select2');
    }

    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = City::where('name','LIKE','%'.$query.'%')->get();

			//DB::table("categories")
            //		->select("id","name")
            //		->where('name','LIKE',"%$search%")
            //		->get();
        }

        return response()->json($data);
    }
}
