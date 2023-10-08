<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests;
use App\Http\Requests\moneyValidationFormRequest;
use App\User;

use App\Models\Historic;

class BalanceController extends Controller
{
    private $totalPage = 5;

    public function index() 
    {
        
        //dd( auth()->user()->balance()->get());
        
        $balance = auth()->user()->balance; 
        
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit() 
    {
        return view('admin.balance.deposit');
    }

    //public function depositStore(Request $request, Balance $balance) 
    public function depositStore(moneyValidationFormRequest $request) 
    {
        //dd($request->value);
        //$balance->deposit($request->value);
        //dd(auth()->user()->balance()->get());
        $balance = auth()->user()->balance()->firstOrCreate([]);
        //dd($balance->deposit($request->value));

        $response = $balance->deposit($request->value);

        if ($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    public function withdraw() {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(moneyValidationFormRequest $request) 
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user) 
    {
        //dd($request->all());
        if (!$sender = $user->getSender($request->sender))
                return redirect()
                ->back()
                ->with('error', 'Usuário informado não foi encontrado!');

        if ($sender->id === auth()->user()->id)
                return redirect()
                ->back()
                ->with('error', 'Valores não podem ser transferidos para você mesmo!');

                $balance = auth()->user()->balance;

                return view('admin.balance.transfer-confirm', compact('sender', 'balance'));

        //dd($sender);
    }

    public function transferStore(moneyValidationFormRequest $request, User $user) 
    {
        if (!$sender = $user->find($request->sender_id))
            return redirect()
                        ->route('balance.transfer')
                        ->with('success', 'Destinatario não encontrado!');

            $balance = auth()->user()->balance()->firstOrCreate([]);
            $response = $balance->transfer($request->value, $sender);
        

        if ($response['success']) {
            return redirect()
                        ->route('balance.transfer')
                        ->with('success', $response['message']);

        } else {

        return redirect()
                        ->router('balance.transfer')
                        ->with('error', $response['message']);
        }
    }

    public function historic(Historic $historic) 
    {
        $historics = auth()->user()
                                ->historics()
                                ->with(['userSender'])
                                ->paginate($this->totalPage);
        //dd($historics);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types'));
    }

    public function searchHistoric(Request $request, Historic $historic) 
    {
        $dataForm = $request->except('_token');

        $historics = $historic->search($dataForm, $this->totalPage);

        $types = $historic->type();

        return view('admin.balance.historics', compact('historics', 'types', 'dataForm'));
    }
}
