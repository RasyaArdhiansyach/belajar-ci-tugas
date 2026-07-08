<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class PembelianController extends BaseController
{
    protected $transactionModel;
    protected $transactionDetailModel;

    public function __construct()
    {
        helper(['number', 'form']);

        $this->transactionModel = new TransactionModel();
        $this->transactionDetailModel = new TransactionDetailModel();
    }

    public function index()
    {
        if(session()->get('role') != 'admin'){
            return redirect()->to('/');
        }

        $transactions = $this->transactionModel
                            ->orderBy('id','DESC')
                            ->findAll();

        $ids = array_column($transactions,'id');

        $products = $this->transactionDetailModel
                        ->getProductsByTransactionIds($ids);

        return view('pembelian/index',[
            'transactions'=>$transactions,
            'products'=>$products
        ]);
    }

    public function status($id)
    {
        if(session()->get('role') != 'admin'){
            return redirect()->to('/');
        }

        $this->transactionModel->update($id,[
            'status'=>$this->request->getPost('status')
        ]);

        return redirect()->back()
            ->with('success','Status berhasil diubah');
    }

}