<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiscountModel;

class DiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
        helper(['form', 'number']);
        $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        return view('discount/index', [
            'discounts' => $this->discountModel->findAll()
        ]);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[discount.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('failed', $this->validator->listErrors());
        }

        $this->discountModel->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect('discount')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $this->discountModel->update($id, [
            'nominal' => $this->request->getPost('nominal')
        ]);

        return redirect('discount')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $this->discountModel->delete($id);

        return redirect('discount')->with('success', 'Data berhasil dihapus');
    }
}