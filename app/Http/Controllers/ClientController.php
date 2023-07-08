<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Loan;

class ClientController extends Controller
{
    public function list() {
    $clients = Client::paginate(5);

    return view('clients.index', ['clients'=>$clients]);
    }

    public function index() {
        return view('clients.form');
    }

    public function singleclient($id) {
        $client = Client::find($id);
        $loans = Loan::where('client_id', $id)->get();
        return view('clients.singleclient', ['client'=>$client, 'loans'=>$loans]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birth' => 'required|date',
        ]);

        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->birth = $request->birth;
        $client->save();

        return redirect()->route('clients');
    }

    public function destroy($id) {
        $client = Client::find($id);

        $client->delete();

        return redirect()->route('clients');
    }

    public function editview($id) {
        $client = Client::find($id);

        return view('clients.editform', ['client'=>$client]);
    }

    public function edit(Request $request, $id) {

        $client = Client::find($id);

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birth' => 'required|date',
        ]);

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->birth = $request->birth;
        $client->save();

        return redirect()->route('clients');
    }

    public function clientsearch() {
        $search_text = $_GET['search'];
        $clients = Client::where('firstname', 'LIKE', '%'.$search_text.'%')
                            ->orWhere('lastname', 'LIKE', '%'.$search_text.'%')
                            ->get();

        return view('clients.search', compact('clients'));
    }

    public function clientsearchtrash() {
        $search_text = $_GET['search'];
        $clients = Client::onlyTrashed()->where('firstname', 'LIKE', '%'.$search_text.'%')
                            ->orWhere('lastname', 'LIKE', '%'.$search_text.'%')
                            ->get();

        return view('clients.searchtrash', compact('clients'));
    }

    public function restoreview() {
        $clients = Client::onlyTrashed()->get();

        return view('clients.restore', ['clients'=>$clients]);
    }

    public function restore($id) {
        $client = Client::onlyTrashed()->find($id);
        $client->restore();

        return redirect()->route('clients.restore');
    }

    public function delete($id) {
        $client = Client::onlyTrashed()->find($id);
        $client->forceDelete();

        return redirect()->route('clients.restore');
    }
}
