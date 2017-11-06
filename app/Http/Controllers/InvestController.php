<?php

namespace cacoma\Http\Controllers;

use Illuminate\Http\Request;
use cacoma\Invest;
use Illuminate\Support\Facades\Auth;
use cacoma\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Validator;
use cacoma\User;
use cacoma\Role;
use Illuminate\Support\Facades\DB;


class InvestController extends Controller
{
	public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$user = Auth::user();
		//clock(User::first(), auth()->user(), $username);
		if ($user->role_id == '1'){
				//$invests = DB::table('invests')
				//	->join('users','invests.user_id','=','users.id')
				//	->get();
				$invests = Invest::with('user')->get();
				//return view('invests.index', compact('usersInvests'));
				//$invests = Invest::with('users','users.name')->get();
      	return view('invests.index')->withinvests($invests);
		} else {
			//return view('welcome');
			$invests = Invest::where('user_id', $user->id )->get();
			return view('invests.index', compact('invests'));
		}
    }

		//$invests = Invest::where('user_id', $userid )->get();
        //$invests = Invest::all()->toArray();
		//return $this->belongsTo('App\User');
    //    return view('invests.index', compact('invests'));
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // criar invests
        return view('invests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
		 /**protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => 'required|string|max:255',
             'type' => 'required|string|max:255',
             ]);
     }*/
    public function store(Request $request)
    {
        //
        $userid = $request->user()->id;
				$invest = $this->validate(request(), [
					'name' => 'required|string|max:255',
					'type' => 'required|string|max:255',
					]);
				Invest::create([
					'name' => $request['name'],
          'type' => $request['type'],
					'user_id' => $userid,
        //$invest = $this->validate(request(), [
        //  'name' => 'required',
        //  'type' => 'required',
				//	'user_id' => 'required',
        ]);

        //Invest::create($invest);

        return back()->with('success', 'O invest foi adicionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $invest = Invest::find($id);
        return view('invests.edit',compact('invest','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
				$invest = Invest::find($id);
				$user = Auth::user();
				//dono e admin somente podem alterar
				if ($user->id == $invest->user_id || $user->role_id == '1'){
					$this->validate(request(), [
						'name' => 'required|string|max:255',
						'type' => 'required|string|max:255',
						]);
	        $invest->name = $request->get('name');
	        $invest->type = $request->get('type');
	        $invest->save();
	        return redirect('invests')->with('success','Invest atualizado');
				}else{
					return back()->with('error', 'O invest nao pode ser adicionado');
				}

				//old update de invest
				//$invest = $this->validate(request(), [
				//	'name' => 'required|string|max:255',
				//	'type' => 'required|string|max:255',
				//	]);
				//Invest::create([
				//	'name' => $request['name'],
        //  'type' => $request['type'],
				//	'user_id' => $userid,




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $invest = Invest::find($id);
				$user = Auth::user();
				//dono e admin somente podem alterar
				if ($user->id == $invest->user_id || $user->role_id == '1'){
       			$invest->delete();
       			return redirect('invests')->with('success','Invest deletado');
		 		}else {
		 				return back()->with('error', 'O invest nao pode ser adicionado');
		 		}
    }
}
