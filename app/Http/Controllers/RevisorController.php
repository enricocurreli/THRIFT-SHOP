<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class RevisorController extends Controller
{
   public function index()
   {
      $announcements_to_revise = Announcement::whereNotNull('is_accepted')->get();
      $announcement_to_check = Announcement::where('is_accepted', null)->get();
      return view('revisor.index', compact('announcement_to_check', 'announcements_to_revise'));
   }

   public function reviseIndex()
   {
      $announcements_to_revise = Announcement::whereNotNull('is_accepted')->get();
      return view('revisor.revise', compact('announcements_to_revise'));
   }

   public function acceptAnnouncement(Announcement $announcement)
   {
      $announcement->setAccepted(true);
      return redirect()->back()->with('message', 'Annuncio approvato');
   }

   public function rejectAnnouncement(Announcement $announcement)
   {
      $announcement->setAccepted(false);
      return redirect()->back()->with('message', 'Annuncio rifiutato');
   }

   public function becomeRevisor(Request $request)
   {

      $name = $request->input('name');
      $email = $request->input('email');
      $usermessage = $request->input('message');

      $user = Auth::user();
      
      // dd($request->message);
      Mail::to('admin@thiftshop.it')->send(new BecomeRevisor($name, $email, $usermessage, $user));
      return redirect()->back()->with('message', 'La richiesta di diventare revisore è stata inviata, risponderemo al più presto.');
   }

   public function makeRevisor(User $user)
   {
      Artisan::call('app:make-user-revisor', ["email" => $user->email]);
      return redirect('/')->with('message', 'L\'utente è diventato revisore');
   }

   public function reviseAnnouncements(Announcement $announcement)
   {
      $announcement->setAccepted(null);
      return redirect()->back()->with('message', 'Annuncio tornato in revisione');
   }

   public function workWithUs()
   {
      return view('revisor.workWithUs');
   }
}
