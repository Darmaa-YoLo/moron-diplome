<?php

namespace App\Http\Controllers;

use App\Models\FunctionPoint;
use App\Models\Loc;
use App\Models\UseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
  public function showHomePage()
  {
    return view('pages.home');
  }

  public function showProjectsPage()
  {
    $user_id = Auth::user()->id;
    $locs = Loc::where('user_id', $user_id)->get();
    $usecases = UseCase::where('user_id', $user_id)->get();
    $functions = FunctionPoint::where('user_id', $user_id)->get();

    return view('pages.projects', [
      'locs' => $locs,
      'usecases' => $usecases,
      'functions' => $functions
    ]);
  }

  public function save_loc(Request $request)
  {
    $user_id = $request->input('user_id');
    $title = $request->input('title');
    $description = $request->input('description');
    $creator = $request->input('creator');
    $executor = $request->input('executor');
    $manager = $request->input('manager');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $mode = $request->input('mode');
    $time = $request->input('time');
    $effort = $request->input('effort');
    $staffs = $request->input('staffs');

    $loc = Loc::create([
      'user_id' => $user_id,
      'title' => $title,
      'description' => $description,
      'creator' => $creator,
      'executor' => $executor,
      'manager' => $manager,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'mode' => $mode,
      'time' => $time,
      'effort' => $effort,
      'staffs' => $staffs
    ]);

    return response($loc);
  }

  public function save_function(Request $request)
  {
    $user_id = $request->input('user_id');
    $title = $request->input('title');
    $description = $request->input('description');
    $creator = $request->input('creator');
    $executor = $request->input('executor');
    $manager = $request->input('manager');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $fp = $request->input('fp');

    $functionP = FunctionPoint::create([
      'user_id' => $user_id,
      'title' => $title,
      'description' => $description,
      'creator' => $creator,
      'executor' => $executor,
      'manager' => $manager,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'fp' => $fp
    ]);

    return response($functionP);
  }

  public function save_usecase(Request $request)
  {
    $user_id = $request->input('user_id');
    $title = $request->input('title');
    $description = $request->input('description');
    $creator = $request->input('creator');
    $executor = $request->input('executor');
    $manager = $request->input('manager');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
    $ucp = $request->input('ucp');

    $useCase = UseCase::create([
      'user_id' => $user_id,
      'title' => $title,
      'description' => $description,
      'creator' => $creator,
      'executor' => $executor,
      'manager' => $manager,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'ucp' => $ucp
    ]);

    return response($useCase);
  }
}
