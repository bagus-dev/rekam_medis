<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use App\Models\PatientsModel;
use App\Models\TreatmentsModel;
use App\Models\FamilyPlanningsModel;
use App\Models\AncusgModel;
use App\Models\ImmunizationModel;
use App\Models\RapidsModel;
use App\Models\PartusModel;
use App\Models\PostMotherModel;
use App\Models\BabyModel;
use App\Models\RefModel;

class Dashboard extends BaseController
{
    protected $userModel, $patientsModel, $validation, $treatmentsModel, $familyplanningsModel, $ancusgModel;
    protected $immunizationModel, $rapidsModel, $partusModel, $postmotherModel, $babyModel, $refModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->patientsModel = new PatientsModel();
        $this->validation = \Config\Services::validation();
        $this->treatmentsModel = new TreatmentsModel();
        $this->familyplanningsModel = new FamilyPlanningsModel();
        $this->ancusgModel = new AncusgModel();
        $this->immunizationModel = new ImmunizationModel();
        $this->rapidsModel = new RapidsModel();
        $this->partusModel = new PartusModel();
        $this->postmotherModel = new PostMotherModel();
        $this->babyModel = new BabyModel();
        $this->refModel = new RefModel();
    }

    public function index()
    {
        $id = user()->id;

        $data = [
            'title' => 'Dasbor',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patients' => $this->patientsModel->findAll(),
            'treatments' => $this->treatmentsModel->findAll(),
            'families' => $this->familyplanningsModel->findAll(),
            'ancs' => $this->ancusgModel->findAll(),
            'immunizations' => $this->immunizationModel->findAll(),
            'rapids' => $this->rapidsModel->findAll(),
            'partus' => $this->partusModel->findAll(),
            'posts' => $this->postmotherModel->findAll(),
            'babies' => $this->babyModel->findAll(),
            'refs' => $this->refModel->findAll(),
            'latest' => $this->patientsModel->orderBy('created_at','DESC')->asObject()->findAll(5)
        ];

        return view('admin/dashboard/index', $data);
    }

    public function patients()
    {
        $id = user()->id;

        $data = [
            'title' => 'Data Pasien',
            'patients' => $this->patientsModel->orderBy('created_at','DESC')->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('admin/patient/index', $data);
    }

    public function add_patients()
    {
        $id = user()->id;

        $data = [
            'title' => 'Data Pasien',
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/patient/add', $data);
    }

    public function save_patients()
    {
        if(!$this->validate([
            'name' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Nama Pasien'
            ],
            'place_of_birth' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Tempat Lahir'
            ],
            'date_of_birth' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Tanggal Lahir'
            ],
            'address' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Alamat'
            ],
            'age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur'
            ],
            'head_of_family' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Kepala Keluarga'
            ],
            'number_family_card' => [
                'rules' => 'required|numeric',
                'label' => 'Nomor Kartu Keluarga'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Pasien Gagal Ditambah!');
        }

        $tgl_lahir = $this->request->getPost('date_of_birth');
        $tgl = substr($tgl_lahir,0,2);
        $bln = substr($tgl_lahir,3,2);
        $thn = substr($tgl_lahir,6);

        $this->patientsModel->insert([
            'name' => $this->request->getPost('name'),
            'place_of_birth' => $this->request->getPost('place_of_birth'),
            'date_of_birth' => $thn."-".$bln."-".$tgl,
            'address' => $this->request->getPost('address'),
            'age' => $this->request->getPost('age'),
            'head_of_family' => $this->request->getPost('head_of_family'),
            'number_family_card' => $this->request->getPost('number_family_card'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/patients')->with('success', 'Data Pasien Berhasil Ditambah');
    }

    public function edit_patients($id_p)
    {
        $id = user()->id;

        $data = [
            'title' => 'Data Pasien',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patient' => $this->patientsModel->where('id',$id_p)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/patient/edit', $data);
    }

    public function update_patients()
    {
        if(!$this->validate([
            'name' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Nama Pasien'
            ],
            'place_of_birth' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Tempat Lahir'
            ],
            'date_of_birth' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Tanggal Lahir'
            ],
            'address' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Alamat'
            ],
            'age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur'
            ],
            'head_of_family' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Kepala Keluarga'
            ],
            'number_family_card' => [
                'rules' => 'required|numeric',
                'label' => 'Nomor Kartu Keluarga'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Pasien Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');
        $tgl_lahir = $this->request->getPost('date_of_birth');
        $tgl = substr($tgl_lahir,0,2);
        $bln = substr($tgl_lahir,3,2);
        $thn = substr($tgl_lahir,6);

        $this->patientsModel->update($id, [
            'name' => $this->request->getPost('name'),
            'place_of_birth' => $this->request->getPost('place_of_birth'),
            'date_of_birth' => $thn."-".$bln."-".$tgl,
            'address' => $this->request->getPost('address'),
            'age' => $this->request->getPost('age'),
            'head_of_family' => $this->request->getPost('head_of_family'),
            'number_family_card' => $this->request->getPost('number_family_card'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/patients')->with('success', 'Data Pasien Berhasil Disimpan');
    }

    public function delete_patients($id)
    {
        if($this->patientsModel->where('id',$id)->delete()) {
            return redirect()->to('admin/patients')->with('success', 'Data Pasien Berhasil Dihapus');
        } else {
            return redirect()->to('admin/patients')->with('failed', 'Data Pasien Gagal Dihapus!');
        }
    }

    public function print_card($id)
    {
        $data = [
            'patient' => $this->patientsModel->where('id',$id)->asObject()->first()
        ];

        return view('admin/patient/card', $data);
    }

    public function treatments()
    {
        $id = user()->id;

        $data = [
            'title' => 'Pengobatan',
            'treatments' => $this->treatmentsModel->select('treatments.*, patients.name, patients.id as pid')->join('patients','treatments.patient_id=patients.id')->orderBy('treatments.created_at','DESC')->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('admin/treatment/index', $data);
    }

    public function add_treatments()
    {
        $id = user()->id;

        $data = [
            'title' => 'Pengobatan',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/treatment/add', $data);
    }

    public function save_treatments()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'complaint' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Keluhan'
            ],
            'supporting_investigation' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'weight' => [
                'rules' => 'required',
                'label' => 'Berat Badan'
            ],
            'body_temperature' => [
                'rules' => 'required',
                'label' => 'Suhu Badan'
            ],
            'tension' => [
                'rules' => 'required',
                'label' => 'Tensi'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'therapy'
            ],
            'price' => [
                'rules' => 'required',
                'label' => 'Harga'
            ],
            'code' => [
                'rules' => 'required',
                'label' => 'Kode'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Pengobatan Gagal Ditambah!');
        }

        if($this->request->getPost('code') === '') {
            $code = '-';
            $diagnose = '-';
            $complaints = '-';
        } else {
            $code = $this->request->getPost('code');

            if($code == 'J06') {
                $diagnose = 'ISPA';
                $complaints = 'Batuk, pilek';
            } elseif($code == 'R50') {
                $diagnose = 'FEBRIS';
                $complaints = 'Panas';
            } elseif($code == 'J00') {
                $diagnose = 'CC/COMMOND COLD';
                $complaints = 'Pilek';
            } elseif($code == 'A091') {
                $diagnose = 'GEA';
                $complaints = 'Diare';
            } elseif($code == 'K29') {
                $diagnose = 'GASTRITIS';
                $complaints = 'Lambung/maag';
            } elseif($code == 'I10') {
                $diagnose = 'HIPERTENSI';
                $complaints = 'Darah tinggi';
            } elseif($code == 'E11') {
                $diagnose = 'DM/DIABETES';
                $complaints = 'Diabetes/kencing manis';
            } elseif($code == 'L30') {
                $diagnose = 'DERMATITIS';
                $complaints = 'Penyakit kulit/gatel2';
            } elseif($code == 'M13') {
                $diagnose = 'ARTRITIS';
                $complaints = 'Sakit kaki, pegel2';
            } elseif($code == 'J18') {
                $diagnose = 'PNEUMONIA';
                $complaints = 'Sesak nafas';
            } elseif($code == 'R51') {
                $diagnose = 'CHEPALGIA';
                $complaints = 'Sakit kepala, pusing';
            } elseif($code == 'K64') {
                $diagnose = 'HEMOROID';
                $complaints = 'Wasir/ambeyen';
            } elseif($code == 'H10') {
                $diagnose = 'CONJUNGTIVITIS';
                $complaints = 'Sakit mata';
            } elseif($code == 'L02') {
                $diagnose = 'BISUL';
                $complaints = 'Bisul';
            } elseif($code == 'F02') {
                $diagnose = 'PHARYNGITIS';
                $complaints = 'Sakit tenggorokan';
            } elseif($code == 'N39') {
                $diagnose = 'ISK';
                $complaints = 'Sakit kencing';
            } elseif($code == 'J45') {
                $diagnose = 'ASMA';
                $complaints = 'Asma';
            } elseif($code == 'H65') {
                $diagnose = 'OTITIS/OMA';
                $complaints = 'Sakit telinga';
            } elseif($code == 'K04') {
                $diagnose = 'GINGIVITIS';
                $complaints = 'Sakit gigi';
            } elseif($code == 'I02') {
                $diagnose = 'ABSES';
                $complaints = 'Abses/bernanah infeksi';
            } elseif($code == 'N61') {
                $diagnose = 'MASTITIS';
                $complaints = 'Payudara sakit, bengkak';
            } elseif($code == 'R11') {
                $diagnose = 'VOMITUS';
                $complaints = 'Mual, muntah';
            } elseif($code == 'J35') {
                $diagnose = 'TONSILLITIS';
                $complaints = 'Amandel';
            } elseif($code == 'K12') {
                $diagnose = 'STOMATITIS';
                $complaints = 'Sariawan';
            } elseif($code == 'H81') {
                $diagnose = 'VERTIGO';
                $complaints = 'Pusing keliyengan';
            } elseif($code == 'N92') {
                $diagnose = 'MENORRHAGIA';
                $complaints = 'Masalah menstruasi/mens berlebihan';
            } elseif($code == 'B01') {
                $diagnose = 'VARICELLA';
                $complaints = 'cacar';
            } elseif($code == 'B00') {
                $diagnose = 'HERPES';
                $complaints = 'herpes';
            } elseif($code == 'N89') {
                $diagnose = 'Flour Albus';
                $complaints = 'Keputihan';
            }
        }

        if($this->request->getPost('examiner') === '') {
            $examiner = '-';
        } else {
            $examiner = $this->request->getPost('examiner');
        }

        $this->treatmentsModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'complaint' => $this->request->getPost('complaint'),
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'weight' => $this->request->getPost('weight'),
            'body_temperature' => $this->request->getPost('body_temperature'),
            'tension' => $this->request->getPost('tension'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $examiner,
            'code' => $code,
            'diagnose' => $diagnose,
            'complaints' => $complaints,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/treatments')->with('success', 'Pengobatan Berhasil Ditambah');
    }

    public function edit_treatments($id_t)
    {
        $id = user()->id;

        $data = [
            'title' => 'Pengobatan',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'treatment' => $this->treatmentsModel->join('patients','treatments.patient_id=patients.id')->where('treatments.id',$id_t)->asObject()->first(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/treatment/edit', $data);
    }

    public function update_treatments()
    {
        if(!$this->validate([
            'complaint' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Keluhan'
            ],
            'supporting_investigation' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'weight' => [
                'rules' => 'required',
                'label' => 'Berat Badan'
            ],
            'body_temperature' => [
                'rules' => 'required',
                'label' => 'Suhu Badan'
            ],
            'tension' => [
                'rules' => 'required',
                'label' => 'Tensi'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'therapy'
            ],
            'price' => [
                'rules' => 'required',
                'label' => 'Harga'
            ],
            'code' => [
                'rules' => 'required',
                'label' => 'Kode'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Pengobatan Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->treatmentsModel->update($id, [
            'complaint' => $this->request->getPost('complaint'),
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'weight' => $this->request->getPost('weight'),
            'body_temperature' => $this->request->getPost('body_temperature'),
            'tension' => $this->request->getPost('tension'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'code' => $this->request->getPost('code'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/treatments')->with('success', 'Pengobatan Berhasil Disimpan');
    }

    public function delete_treatments($id)
    {
        if($this->treatmentsModel->where('id',$id)->delete()) {
            return redirect()->to('admin/treatments')->with('success', 'Pengobatan Berhasil Dihapus');
        } else {
            return redirect()->to('admin/treatments')->with('failed', 'Pengobatan Gagal Dihapus!');
        }
    }

    public function family_planning()
    {
        $id = user()->id;

        $data = [
            'title' => 'Keluarga Berencana',
            'families' => $this->familyplanningsModel->select('patients.name, patients.age, patients.head_of_family, patients.address, patients.id as pid, family_plannings.*')->join('patients','family_plannings.patient_id=patients.id')->orderBy('family_plannings.created_at','DESC')->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('admin/family_plannings/index', $data);
    }

    public function add_family_planning()
    {
        $id = user()->id;

        $data = [
            'title' => 'Keluarga Berencana',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/family_plannings/add', $data);
    }

    public function save_family_planning()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'type' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Jenis KB',
                'errors' => [
                    'in_list' => 'Jenis KB harus dipilih!'
                ]
            ],
            'number_of_children' => [
                'rules' => 'required|numeric',
                'label' => 'Jumlah Anak'
            ],
            'last_child_age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur Anak Terakhir'
            ],
            'supporting_investigation' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'revisit' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Kunjungan Ulang'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'blood' => [
                'rules' => 'required|numeric',
                'label' => 'Tensi'
            ],
            'description' => [
                'rules' => 'required',
                'label' => 'Keterangan'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Keluarga Berencana Gagal Ditambah!');
        }

        $revisit = $this->request->getPost('revisit');
        $tgl = substr($revisit,0,2);
        $bln = substr($revisit,3,2);
        $thn = substr($revisit,6);

        $this->familyplanningsModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'type' => $this->request->getPost('type'),
            'number_of_children' => $this->request->getPost('number_of_children'),
            'last_child_age' => $this->request->getPost('last_child_age'),
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'revisit' => $thn."-".$bln."-".$tgl,
            'weight' => $this->request->getPost('weight'),
            'blood' => $this->request->getPost('blood'),
            'description' => $this->request->getPost('description'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/family-planning')->with('success', 'Keluarga Berencana Berhasil Ditambah');
    }

    public function edit_family_planning($id_f)
    {
        $id = user()->id;

        $data = [
            'title' => 'Keluarga Berencana',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'family' => $this->familyplanningsModel->select('patients.name, family_plannings.*')->where('family_plannings.id',$id_f)->join('patients','family_plannings.patient_id=patients.id')->asObject()->first(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/family_plannings/edit', $data);
    }

    public function update_family_planning()
    {
        if(!$this->validate([
            'type' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Jenis KB',
                'errors' => [
                    'in_list' => 'Jenis KB harus dipilih!'
                ]
            ],
            'number_of_children' => [
                'rules' => 'required|numeric',
                'label' => 'Jumlah Anak'
            ],
            'last_child_age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur Anak Terakhir'
            ],
            'supporting_investigation' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'revisit' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Kunjungan Ulang'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'blood' => [
                'rules' => 'required|numeric',
                'label' => 'Tensi'
            ],
            'description' => [
                'rules' => 'required',
                'label' => 'Keterangan'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required|min_length[3]',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Keluarga Berencana Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');
        $revisit = $this->request->getPost('revisit');
        $tgl = substr($revisit,0,2);
        $bln = substr($revisit,3,2);
        $thn = substr($revisit,6);

        $this->familyplanningsModel->update($id, [
            'type' => $this->request->getPost('type'),
            'number_of_children' => $this->request->getPost('number_of_children'),
            'last_child_age' => $this->request->getPost('last_child_age'),
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'revisit' => $thn."-".$bln."-".$tgl,
            'weight' => $this->request->getPost('weight'),
            'blood' => $this->request->getPost('blood'),
            'description' => $this->request->getPost('description'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/family-planning')->with('success', 'Keluarga Berencana Berhasil Disimpan');
    }

    public function delete_planning($id)
    {
        if($this->familyplanningsModel->where('id',$id)->delete()) {
            return redirect()->to('admin/family-planning')->with('success', 'Keluarga Berencana Berhasil Dihapus');
        } else {
            return redirect()->to('admin/family-planning')->with('failed', 'Keluarga Berencana Gagal Dihapus!');
        }
    }

    public function anc_usg()
    {
        $id = user()->id;

        $data = [
            'title' => 'ANC & USG',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'anc_usgs' => $this->ancusgModel->select('patients.name, patients.id as pid, patients.date_of_birth, anc_usg.*')->join('patients','anc_usg.patient_id=patients.id')->orderBy('anc_usg.created_at','DESC')->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first()
        ];

        return view('admin/anc_usg/index', $data);
    }

    public function add_anc_usg()
    {
        $id = user()->id;

        $data = [
            'title' => 'ANC & USG',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/anc_usg/add', $data);
    }

    public function save_anc_usg()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'husband' => [
                'rules' => 'required|alpha_space',
                'label' => 'Nama Suami'
            ],
            'mother' => [
                'rules' => 'permit_empty|alpha_space',
                'label' => 'Nama Ibu Kandung'
            ],
            'address' => [
                'rules' => 'required',
                'label' => 'Alamat'
            ],
            'education' => [
                'rules' => 'permit_empty',
                'label' => 'Pendidikan'
            ],
            'job' => [
                'rules' => 'permit_empty',
                'label' => 'Pekerjaan'
            ],
            'nik' => [
                'rules' => 'permit_empty|numeric',
                'label' => 'Nomor NIK'
            ],
            'visit' => [
                'rules' => 'in_list[l,b]',
                'label' => 'Kunjungan',
                'errors' => [
					'in_list' => 'Kunjungan harus dipilih!'
				],
            ],
            'revisit' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Kunjungan Ulang'
            ],
            'g' => [
                'rules' => 'required',
                'label' => 'G'
            ],
            'p' => [
                'rules' => 'required',
                'label' => 'P'
            ],
            'a' => [
                'rules' => 'required',
                'label' => 'A'
            ],
            'hpht' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'HPHT'
            ],
            'tp' => [
                'rules' => 'required',
                'label' => 'TP'
            ],
            'gestational_age' => [
                'rules' => 'required',
                'label' => 'Usia Kehamilan'
            ],
            'tb' => [
                'rules' => 'required|numeric',
                'label' => 'TB'
            ],
            'bb' => [
                'rules' => 'required|numeric',
                'label' => 'BB'
            ],
            'td' => [
                'rules' => 'required',
                'label' => 'TD'
            ],
            'lila' => [
                'rules' => 'required',
                'label' => 'LILA'
            ],
            'tfu' => [
                'rules' => 'required',
                'label' => 'TFU'
            ],
            'dii' => [
                'rules' => 'required|numeric',
                'label' => 'DII'
            ],
            'pres' => [
                'rules' => 'permit_empty',
                'label' => 'PRES'
            ],
            'tt' => [
                'rules' => 'required',
                'label' => 'TT'
            ],
            'fe' => [
                'rules' => 'permit_empty',
                'label' => 'FE'
            ],
            'fetal_position' => [
                'rules' => 'required',
                'label' => 'Letak Janin'
            ],
            'fetal_heart_rate' => [
                'rules' => 'required',
                'label' => 'Detak Jantung Janin'
            ],
            'immunization' => [
                'rules' => 'required',
                'label' => 'Imunisasi'
            ],
            'blood_boost_tablets' => [
                'rules' => 'required',
                'label' => 'Tablet Tambah Darah'
            ],
            'lab' => [
                'rules' => 'required',
                'label' => 'Lab'
            ],
            'blood' => [
                'rules' => 'permit_empty',
                'label' => 'GOLDAR'
            ],
            'hb' => [
                'rules' => 'permit_empty',
                'label' => 'HB'
            ],
            'hiv' => [
                'rules' => 'permit_empty',
                'label' => 'HIV'
            ],
            'hbsag' => [
                'rules' => 'permit_empty',
                'label' => 'HBSAG'
            ],
            'sifilis' => [
                'rules' => 'permit_empty',
                'label' => 'SIFILIS'
            ],
            'urine' => [
                'rules' => 'required',
                'label' => 'Urine Protein'
            ],
            'glukosa' => [
                'rules' => 'required',
                'label' => 'Glukosa'
            ],
            'ref' => [
                'rules' => 'permit_empty',
                'label' => 'RUJUKAN'
            ],
            'diagnose' => [
                'rules' => 'required',
                'label' => 'DIAGNOSA'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'status' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Status Pasien',
                'errors' => [
					'in_list' => 'Status Pasien harus dipilih!'
				],
            ],
            'governance' => [
                'rules' => 'required',
                'label' => 'Tata Laksana'
            ],
            'counseling' => [
                'rules' => 'required',
                'label' => 'Konseling'
            ],
            'service_place' => [
                'rules' => 'required',
                'label' => 'Tempat Pelayanan'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'permit_empty',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'ANC & USG Gagal Disimpan!');
        }

        if(isset($_POST['fe'])) {
            $fe = $this->request->getPost('fe');
        } else {
            $fe = 0;
        }

        $revisit = $this->request->getPost('revisit');
        $tgl = substr($revisit,0,2);
        $bln = substr($revisit,3,2);
        $thn = substr($revisit,6);

        $hpht = $this->request->getPost('hpht');
        $tgl_hpht = substr($hpht,0,2);
        $bln_hpht = substr($hpht,3,2);
        $thn_hpht = substr($hpht,6);

        $this->ancusgModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'husband' => $this->request->getPost('husband'),
            'mother' => $this->request->getPost('mother'),
            'address' => $this->request->getPost('address'),
            'education' => $this->request->getPost('education'),
            'job' => $this->request->getPost('job'),
            'nik' => $this->request->getPost('nik'),
            'visit' => $this->request->getPost('visit'),
            'revisit' => $thn."-".$bln."-".$tgl,
            'g' => $this->request->getPost('g'),
            'p' => $this->request->getPost('p'),
            'a' => $this->request->getPost('a'),
            'hpht' => $thn_hpht."-".$bln_hpht."-".$tgl_hpht,
            'tp' => $this->request->getPost('tp'),
            'gestational_age' => $this->request->getPost('gestational_age'),
            'tb' => $this->request->getPost('tb'),
            'bb' => $this->request->getPost('bb'),
            'td' => $this->request->getPost('td'),
            'lila' => $this->request->getPost('lila'),
            'tfu' => $this->request->getPost('tfu'),
            'dii' => $this->request->getPost('dii'),
            'pres' => $this->request->getPost('pres'),
            'tt' => $this->request->getPost('tt'),
            'fe' => $fe,
            'fetal_position' => $this->request->getPost('fetal_position'),
            'fetal_heart_rate' => $this->request->getPost('fetal_heart_rate'),
            'immunization' => $this->request->getPost('immunization'),
            'blood_boost_tablets' => $this->request->getPost('blood_boost_tablets'),
            'lab' => $this->request->getPost('lab'),
            'blood' => $this->request->getPost('blood'),
            'hb' => $this->request->getPost('hb'),
            'hiv' => $this->request->getPost('hiv'),
            'hbsag' => $this->request->getPost('hbsag'),
            'sifilis' => $this->request->getPost('sifilis'),
            'urine' => $this->request->getPost('urine'),
            'glukosa' => $this->request->getPost('glukosa'),
            'ref' => $this->request->getPost('ref'),
            'diagnose' => $this->request->getPost('diagnose'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'status' => $this->request->getPost('status'),
            'governance' => $this->request->getPost('governance'),
            'counseling' => $this->request->getPost('counseling'),
            'service_place' => $this->request->getPost('service_place'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/anc-usg')->with('success', 'ANC & USG Berhasil Disimpan');
    }

    public function edit_anc_usg($id_a)
    {
        $id = user()->id;

        $data = [
            'title' => 'ANC & USG',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'anc' => $this->ancusgModel->select('patients.id as pid, patients.name, anc_usg.*')->where('anc_usg.id',$id_a)->join('patients','anc_usg.patient_id=patients.id')->asObject()->first(),
            'id' => $id_a,
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/anc_usg/edit', $data);
    }

    public function update_anc_usg()
    {
        if(!$this->validate([
            'husband' => [
                'rules' => 'required|alpha_space',
                'label' => 'Nama Suami'
            ],
            'mother' => [
                'rules' => 'permit_empty|alpha_space',
                'label' => 'Nama Ibu Kandung'
            ],
            'address' => [
                'rules' => 'required',
                'label' => 'Alamat'
            ],
            'education' => [
                'rules' => 'permit_empty',
                'label' => 'Pendidikan'
            ],
            'job' => [
                'rules' => 'permit_empty',
                'label' => 'Pekerjaan'
            ],
            'nik' => [
                'rules' => 'permit_empty|numeric',
                'label' => 'Nomor NIK'
            ],
            'visit' => [
                'rules' => 'in_list[l,b]',
                'label' => 'Kunjungan',
                'errors' => [
					'in_list' => 'Kunjungan harus dipilih!'
				],
            ],
            'revisit' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Kunjungan Ulang'
            ],
            'g' => [
                'rules' => 'required',
                'label' => 'G'
            ],
            'p' => [
                'rules' => 'required',
                'label' => 'P'
            ],
            'a' => [
                'rules' => 'required',
                'label' => 'A'
            ],
            'hpht' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'HPHT'
            ],
            'tp' => [
                'rules' => 'required',
                'label' => 'TP'
            ],
            'gestational_age' => [
                'rules' => 'required',
                'label' => 'Usia Kehamilan'
            ],
            'tb' => [
                'rules' => 'required|numeric',
                'label' => 'TB'
            ],
            'bb' => [
                'rules' => 'required|numeric',
                'label' => 'BB'
            ],
            'td' => [
                'rules' => 'required',
                'label' => 'TD'
            ],
            'lila' => [
                'rules' => 'required',
                'label' => 'LILA'
            ],
            'tfu' => [
                'rules' => 'required',
                'label' => 'TFU'
            ],
            'dii' => [
                'rules' => 'required|numeric',
                'label' => 'DII'
            ],
            'pres' => [
                'rules' => 'permit_empty',
                'label' => 'PRES'
            ],
            'tt' => [
                'rules' => 'required',
                'label' => 'TT'
            ],
            'fe' => [
                'rules' => 'permit_empty',
                'label' => 'FE'
            ],
            'fetal_position' => [
                'rules' => 'required',
                'label' => 'Letak Janin'
            ],
            'fetal_heart_rate' => [
                'rules' => 'required',
                'label' => 'Detak Jantung Janin'
            ],
            'immunization' => [
                'rules' => 'required',
                'label' => 'Imunisasi'
            ],
            'blood_boost_tablets' => [
                'rules' => 'required',
                'label' => 'Tablet Tambah Darah'
            ],
            'lab' => [
                'rules' => 'required',
                'label' => 'Lab'
            ],
            'blood' => [
                'rules' => 'permit_empty',
                'label' => 'GOLDAR'
            ],
            'hb' => [
                'rules' => 'permit_empty',
                'label' => 'HB'
            ],
            'hiv' => [
                'rules' => 'permit_empty',
                'label' => 'HIV'
            ],
            'hbsag' => [
                'rules' => 'permit_empty',
                'label' => 'HBSAG'
            ],
            'sifilis' => [
                'rules' => 'permit_empty',
                'label' => 'SIFILIS'
            ],
            'urine' => [
                'rules' => 'required',
                'label' => 'Urine Protein'
            ],
            'glukosa' => [
                'rules' => 'required',
                'label' => 'Glukosa'
            ],
            'ref' => [
                'rules' => 'permit_empty',
                'label' => 'RUJUKAN'
            ],
            'diagnose' => [
                'rules' => 'required',
                'label' => 'DIAGNOSA'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'status' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Status Pasien',
                'errors' => [
					'in_list' => 'Status Pasien harus dipilih!'
				],
            ],
            'governance' => [
                'rules' => 'required',
                'label' => 'Tata Laksana'
            ],
            'counseling' => [
                'rules' => 'required',
                'label' => 'Konseling'
            ],
            'service_place' => [
                'rules' => 'required',
                'label' => 'Tempat Pelayanan'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'permit_empty',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'ANC & USG Gagal Disimpan!');
        }

        if(isset($_POST['fe'])) {
            $fe = $this->request->getPost('fe');
        } else {
            $fe = 0;
        }

        $revisit = $this->request->getPost('revisit');
        $tgl = substr($revisit,0,2);
        $bln = substr($revisit,3,2);
        $thn = substr($revisit,6);

        $hpht = $this->request->getPost('hpht');
        $tgl_hpht = substr($hpht,0,2);
        $bln_hpht = substr($hpht,3,2);
        $thn_hpht = substr($hpht,6);

        $id = $this->request->getPost('id');

        $this->ancusgModel->update($id, [
            'husband' => $this->request->getPost('husband'),
            'mother' => $this->request->getPost('mother'),
            'address' => $this->request->getPost('address'),
            'education' => $this->request->getPost('education'),
            'job' => $this->request->getPost('job'),
            'nik' => $this->request->getPost('nik'),
            'visit' => $this->request->getPost('visit'),
            'revisit' => $thn."-".$bln."-".$tgl,
            'g' => $this->request->getPost('g'),
            'p' => $this->request->getPost('p'),
            'a' => $this->request->getPost('a'),
            'hpht' => $thn_hpht."-".$bln_hpht."-".$tgl_hpht,
            'tp' => $this->request->getPost('tp'),
            'gestational_age' => $this->request->getPost('gestational_age'),
            'tb' => $this->request->getPost('tb'),
            'bb' => $this->request->getPost('bb'),
            'td' => $this->request->getPost('td'),
            'lila' => $this->request->getPost('lila'),
            'tfu' => $this->request->getPost('tfu'),
            'dii' => $this->request->getPost('dii'),
            'pres' => $this->request->getPost('pres'),
            'tt' => $this->request->getPost('tt'),
            'fe' => $fe,
            'fetal_position' => $this->request->getPost('fetal_position'),
            'fetal_heart_rate' => $this->request->getPost('fetal_heart_rate'),
            'immunization' => $this->request->getPost('immunization'),
            'blood_boost_tablets' => $this->request->getPost('blood_boost_tablets'),
            'lab' => $this->request->getPost('lab'),
            'blood' => $this->request->getPost('blood'),
            'hb' => $this->request->getPost('hb'),
            'hiv' => $this->request->getPost('hiv'),
            'hbsag' => $this->request->getPost('hbsag'),
            'sifilis' => $this->request->getPost('sifilis'),
            'urine' => $this->request->getPost('urine'),
            'glukosa' => $this->request->getPost('glukosa'),
            'ref' => $this->request->getPost('ref'),
            'diagnose' => $this->request->getPost('diagnose'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'status' => $this->request->getPost('status'),
            'governance' => $this->request->getPost('governance'),
            'counseling' => $this->request->getPost('counseling'),
            'service_place' => $this->request->getPost('service_place'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/anc-usg')->with('success', 'ANC & USG Berhasil Disimpan');
    }

    public function delete_anc_usg($id)
    {
        if($this->ancusgModel->where('id',$id)->delete()) {
            return redirect()->to('admin/anc-usg')->with('success', 'ANC & USG Berhasil Dihapus');
        }
        
        return redirect()->to('admin/anc-usg')->with('failed', 'ANC & USG Gagal Dihapus!');
    }

    public function immunization()
    {
        $id = user()->id;

        $data = [
            'title' => 'Imunisasi',
            'profile' => $this->userModel->where('id',$id)->first(),
            'immunizations' => $this->immunizationModel->select('immunizations.*, patients.name, patients.id as pid')->join('patients','patients.id=immunizations.patient_id')->orderBy('immunizations.created_at','DESC')->asObject()->findAll()
        ];

        return view('admin/immunization/index', $data);
    }

    public function add_immunization()
    {
        $id = user()->id;

        $data = [
            'title' => 'Imunisasi',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/immunization/add', $data);
    }

    public function save_immunization()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'date_of_birth' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Tanggal Lahir'
            ],
            'address' => [
                'rules' => 'required',
                'label' => 'Alamat'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'body_temp' => [
                'rules' => 'required|numeric',
                'label' => 'Suhu Badan'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Tinggi Badan'
            ],
            'parent_name' => [
                'rules' => 'required',
                'label' => 'Nama Orang Tua'
            ],
            'supporting_investigation' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'immune_type' => [
                'rules' => 'required',
                'label' => 'Jenis Imunisasi'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Imunisasi Gagal Ditambah!');
        }

        $tgl_lahir = $this->request->getPost('date_of_birth');
        $tgl = substr($tgl_lahir,0,2);
        $bln = substr($tgl_lahir,3,2);
        $thn = substr($tgl_lahir,6);

        if(!isset($_POST["bcg"])) {
            $bcg = "";
        } else {
            $bcg = $this->request->getPost('bcg');
        }
        if(!isset($_POST["hb_neo"])) {
            $hb_neo = "";
        } else {
            $hb_neo = $this->request->getPost('hb_neo');
        }
        if(!isset($_POST["hib_1"])) {
            $hib_1 = "";
        } else {
            $hib_1 = $this->request->getPost('hib_1');
        }
        if(!isset($_POST["hib_2"])) {
            $hib_2 = "";
        } else {
            $hib_2 = $this->request->getPost('hib_2');
        }
        if(!isset($_POST["hib_3"])) {
            $hib_3 = "";
        } else {
            $hib_3 = $this->request->getPost('hib_3');
        }
        if(!isset($_POST["polio_1"])) {
            $polio_1 = "";
        } else {
            $polio_1 = $this->request->getPost('polio_1');
        }
        if(!isset($_POST["polio_2"])) {
            $polio_2 = "";
        } else {
            $polio_2 = $this->request->getPost('polio_2');
        }
        if(!isset($_POST["polio_3"])) {
            $polio_3 = "";
        } else {
            $polio_3 = $this->request->getPost('polio_3');
        }
        if(!isset($_POST["polio_4"])) {
            $polio_4 = "";
        } else {
            $polio_4 = $this->request->getPost('polio_4');
        }
        if(!isset($_POST["campak"])) {
            $campak = "";
        } else {
            $campak = $this->request->getPost('campak');
        }
        if(!isset($_POST["polio_ipv"])) {
            $polio_ipv = "";
        } else {
            $polio_ipv = $this->request->getPost('polio_ipv');
        }

        $this->immunizationModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'date_of_birth' => $thn."-".$bln."-".$tgl,
            'address' => $this->request->getPost('address'),
            'weight' => $this->request->getPost('weight'),
            'body_temp' => $this->request->getPost('body_temp'),
            'height' => $this->request->getPost('height'),
            'parent_name' => $this->request->getPost('parent_name'),
            'bcg' => $bcg,
            'hb_neo' => $hb_neo,
            'hib_1' => $hib_1,
            'hib_2' => $hib_2,
            'hib_3' => $hib_3,
            'polio_1' => $polio_1,
            'polio_2' => $polio_2,
            'polio_3' => $polio_3,
            'polio_4' => $polio_4,
            'campak' => $campak,
            'booster' => $this->request->getPost('booster'),
            'polio_ipv' => $polio_ipv,
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'immune_type' => $this->request->getPost('immune_type'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/immunization')->with('success', 'Imunisasi Berhasil Ditambah');
    }

    public function edit_immunization($id_i)
    {
        $id = user()->id;

        $data = [
            'title' => 'Imunisasi',
            'profile' => $this->userModel->where('id',$id)->first(),
            'immune' => $this->immunizationModel->select('immunizations.*, patients.name, patients.id as pid')->join('patients','patients.id=immunizations.patient_id')->where('immunizations.id',$id_i)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/immunization/edit', $data);
    }

    public function update_immunization()
    {
        if(!$this->validate([
            'date_of_birth' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Tanggal Lahir'
            ],
            'address' => [
                'rules' => 'required',
                'label' => 'Alamat'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'body_temp' => [
                'rules' => 'required|numeric',
                'label' => 'Suhu Badan'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Tinggi Badan'
            ],
            'parent_name' => [
                'rules' => 'required',
                'label' => 'Nama Orang Tua'
            ],
            'supporting_investigation' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'immune_type' => [
                'rules' => 'required',
                'label' => 'Jenis Imunisasi'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Imunisasi Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $tgl_lahir = $this->request->getPost('date_of_birth');
        $tgl = substr($tgl_lahir,0,2);
        $bln = substr($tgl_lahir,3,2);
        $thn = substr($tgl_lahir,6);

        if(!isset($_POST["bcg"])) {
            $bcg = "";
        } else {
            $bcg = $this->request->getPost('bcg');
        }
        if(!isset($_POST["hb_neo"])) {
            $hb_neo = "";
        } else {
            $hb_neo = $this->request->getPost('hb_neo');
        }
        if(!isset($_POST["hib_1"])) {
            $hib_1 = "";
        } else {
            $hib_1 = $this->request->getPost('hib_1');
        }
        if(!isset($_POST["hib_2"])) {
            $hib_2 = "";
        } else {
            $hib_2 = $this->request->getPost('hib_2');
        }
        if(!isset($_POST["hib_3"])) {
            $hib_3 = "";
        } else {
            $hib_3 = $this->request->getPost('hib_3');
        }
        if(!isset($_POST["polio_1"])) {
            $polio_1 = "";
        } else {
            $polio_1 = $this->request->getPost('polio_1');
        }
        if(!isset($_POST["polio_2"])) {
            $polio_2 = "";
        } else {
            $polio_2 = $this->request->getPost('polio_2');
        }
        if(!isset($_POST["polio_3"])) {
            $polio_3 = "";
        } else {
            $polio_3 = $this->request->getPost('polio_3');
        }
        if(!isset($_POST["polio_4"])) {
            $polio_4 = "";
        } else {
            $polio_4 = $this->request->getPost('polio_4');
        }
        if(!isset($_POST["campak"])) {
            $campak = "";
        } else {
            $campak = $this->request->getPost('campak');
        }
        if(!isset($_POST["polio_ipv"])) {
            $polio_ipv = "";
        } else {
            $polio_ipv = $this->request->getPost('polio_ipv');
        }

        $this->immunizationModel->update($id, [
            'date_of_birth' => $thn."-".$bln."-".$tgl,
            'address' => $this->request->getPost('address'),
            'weight' => $this->request->getPost('weight'),
            'body_temp' => $this->request->getPost('body_temp'),
            'height' => $this->request->getPost('height'),
            'parent_name' => $this->request->getPost('parent_name'),
            'bcg' => $bcg,
            'hb_neo' => $hb_neo,
            'hib_1' => $hib_1,
            'hib_2' => $hib_2,
            'hib_3' => $hib_3,
            'polio_1' => $polio_1,
            'polio_2' => $polio_2,
            'polio_3' => $polio_3,
            'polio_4' => $polio_4,
            'campak' => $campak,
            'booster' => $this->request->getPost('booster'),
            'polio_ipv' => $polio_ipv,
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'immune_type' => $this->request->getPost('immune_type'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/immunization')->with('success', 'Imunisasi Berhasil Disimpan');
    }

    public function delete_immunization($id)
    {
        if($this->immunizationModel->where('id',$id)->delete()) {
            return redirect()->to('admin/immunization')->with('success', 'Imunisasi Berhasil Dihapus');
        }
        
        return redirect()->to('admin/immunization')->with('failed', 'Imunisasi Gagal Dihapus!');
    }

    public function rapid()
    {
        $id = user()->id;

        $data = [
            'title' => 'Rapid',
            'profile' => $this->userModel->where('id',$id)->first(),
            'rapids' => $this->rapidsModel->select('rapids.*, patients.name, patients.id as pid')->join('patients','patients.id=rapids.patient_id')->orderBy('rapids.created_at')->asObject()->findAll()
        ];

        return view('admin/rapid/index', $data);
    }

    public function add_rapid()
    {
        $id = user()->id;

        $data = [
            'title' => 'Rapid',
            'patients' => $this->patientsModel->asObject()->findAll(),
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        return view('admin/rapid/add', $data);
    }

    public function save_rapid()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'supporting_investigation' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'rapid_type' => [
                'rules' => 'required',
                'label' => 'Jenis Rapid'
            ],
            'result' => [
                'rules' => 'required',
                'label' => 'Hasil'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Rapid Gagal Ditambah!');
        }

        $this->rapidsModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'rapid_type' => $this->request->getPost('rapid_type'),
            'result' => $this->request->getPost('result'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/rapid')->with('success', 'Rapid Berhasil Ditambah');
    }

    public function edit_rapid($id_r)
    {
        $id = user()->id;

        $data = [
            'title' => 'Rapid',
            'profile' => $this->userModel->where('id',$id)->first(),
            'rapid' => $this->rapidsModel->select('rapids.*, patients.name')->join('patients','patients.id=rapids.patient_id')->where('rapids.id',$id_r)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/rapid/edit', $data);
    }

    public function update_rapid()
    {
        if(!$this->validate([
            'supporting_investigation' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Penunjang'
            ],
            'rapid_type' => [
                'rules' => 'required',
                'label' => 'Jenis Rapid'
            ],
            'result' => [
                'rules' => 'required',
                'label' => 'Hasil'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Rapid Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->rapidsModel->update($id, [
            'supporting_investigation' => $this->request->getPost('supporting_investigation'),
            'rapid_type' => $this->request->getPost('rapid_type'),
            'result' => $this->request->getPost('result'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/rapid')->with('success', 'Rapid Berhasil Disimpan');
    }

    public function delete_rapid($id)
    {
        if($this->rapidsModel->where('id',$id)->delete()) {
            return redirect()->to('admin/rapid')->with('success', 'Rapid Berhasil Dihapus');
        }
        
        return redirect()->to('admin/rapid')->with('failed', 'Rapid Gagal Dihapus!');
    }

    public function parturition()
    {
        $id = user()->id;

        $data = [
            'title' => 'Partus',
            'profile' => $this->userModel->where('id',$id)->first(),
            'partus' => $this->partusModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, partus.*')->join('patients','patients.id=partus.patient_id')->orderBy('partus.created_at','DESC')->asObject()->findAll()
        ];

        return view('admin/partus/index', $data);
    }

    public function add_parturition()
    {
        $id = user()->id;

        $data = [
            'title' => 'Partus',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patients' => $this->patientsModel->asObject()->findAll(),
            'validation' => $this->validation
        ];

        return view('admin/partus/add', $data);
    }

    public function save_parturition()
    {
        $complication = $this->request->getPost('complication');

        if($complication == '1') {
            $rules_desc = 'required';
        } elseif($complication == '2') {
            $rules_desc = 'permit_empty';
        }

        $refer = $this->request->getPost('refer');

        if($refer == '1') {
            $rules_desc_refer = 'required';
        } elseif($refer == '2') {
            $rules_desc_refer = 'permit_empty';
        }

        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Ibu'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Tinggi Badan'
            ],
            'first_day' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Hari Pertama Haid Terakhir'
            ],
            'estimated_day' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Hari Taksiran Persalinan'
            ],
            'date' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam'
            ],
            'blood_group' => [
                'rules' => 'required|in_list[1,2,3,4]',
                'label' => 'Golongan Darah',
                'errors' => [
                    'in_list' => 'Golongan Darah harus dipilih!'
                ]
            ],
            'contraceptive_use' => [
                'rules' => 'required',
                'label' => 'Penggunaan Kontrasepsi Sebelum Hamil'
            ],
            'disease_history' => [
                'rules' => 'required',
                'label' => 'Riwayat Penyakit yang Diderita Ibu'
            ],
            'allergy_history' => [
                'rules' => 'required',
                'label' => 'Riwayat Alergi'
            ],
            'immunization' => [
                'rules' => 'required',
                'label' => 'Status Imunisasi Tetanus Terakhir'
            ],
            'g' => [
                'rules' => 'required',
                'label' => 'G'
            ],
            'p' => [
                'rules' => 'required',
                'label' => 'P'
            ],
            'a' => [
                'rules' => 'required',
                'label' => 'A'
            ],
            'obstetric_p' => [
                'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[11]',
                'label' => 'P'
            ],
            'obstetric_a' => [
                'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[11]',
                'label' => 'A'
            ],
            'pregnancy' => [
                'rules' => 'required|numeric',
                'label' => 'Kehamilan Ke-'
            ],
            'year' => [
                'rules' => 'required|valid_date[Y]',
                'label' => 'Tahun'
            ],
            'born' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Hidup/Mati/Abortus',
                'errors' => [
                    'in_list' => 'Lahir Hidup/Mati/Abortus harus dipilih!'
                ]
            ],
            'born_app' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Aterm/Pre Term/Post Term',
                'errors' => [
                    'in_list' => 'Lahir Aterm/Pre Term/Post Term harus dipilih!'
                ]
            ],
            'born_sso' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Spontan/SC/Lainnya',
                'errors' => [
                    'in_list' => 'Lahir Spontan/SC/Lainnya Term harus dipilih!'
                ]
            ],
            'weight_born' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Lahir'
            ],
            'height_born' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Lahir'
            ],
            'head_circ' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Lahir'
            ],
            'birthing_place' => [
                'rules' => 'required',
                'label' => 'Tempat Bersalin, Nakes'
            ],
            'condition' => [
                'rules' => 'required',
                'label' => 'Kondisi Anak Saat Ini'
            ],
            'complication' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Komplikasi Kehamilan/Persalinan',
                'errors' => [
                    'in_list' => 'Komplikasi Kehamilan/Persalinan harus dipilih!'
                ]
            ],
            'child' => [
                'rules' => 'required',
                'label' => 'Anak'
            ],
            'gender' => [
                'rules' => 'in_list[1,2]',
                'label' => 'Jenis Kelamin',
                'errors' => [
                    'in_list' => 'Jenis Kelamin harus dipilih!'
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[10]|max_length[13]',
                'label' => 'Nomor HP'
            ],
            'description' => [
                'rules' => $rules_desc,
                'label' => 'Keterangan Komplikasi'
            ],
            'refer' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Rujuk',
                'errors' => [
                    'in_list' => 'Rujuk harus dipilih!'
                ]
            ],
            'desc_refer' => [
                'rules' => $rules_desc_refer,
                'label' => 'Keterangan Rujuk'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Partus Gagal Ditambah!');
        }

        if(!isset($_POST['hecting'])) {
            $hecting = 0;
        } else {
            $hecting = 1;
        }

        $first_day = $this->request->getPost('first_day');
        $estimated_day = $this->request->getPost('estimated_day');
        $date = $this->request->getPost('date');

        $tgl_first = substr($first_day,0,2);
        $bln_first = substr($first_day,3,2);
        $thn_first = substr($first_day,6);

        $tgl_esti = substr($estimated_day,0,2);
        $bln_esti = substr($estimated_day,3,2);
        $thn_esti = substr($estimated_day,6);

        $tgl_date = substr($date,0,2);
        $bln_date = substr($date,3,2);
        $thn_date = substr($date,6,4);
        $jam_date = substr($date,11,2);
        $min_date = substr($date,14);

        $this->partusModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'first_day' => $thn_first."-".$bln_first."-".$tgl_first,
            'estimated_day' => $thn_esti."-".$bln_esti."-".$tgl_esti,
            'date' => $thn_date."-".$bln_date."-".$tgl_date." ".$jam_date.":".$min_date,
            'blood_group' => $this->request->getPost('blood_group'),
            'contraceptive_use' => $this->request->getPost('contraceptive_use'),
            'disease_history' => $this->request->getPost('disease_history'),
            'allergy_history' => $this->request->getPost('allergy_history'),
            'immunization' => $this->request->getPost('immunization'),
            'g' => $this->request->getPost('g'),
            'p' => $this->request->getPost('p'),
            'a' => $this->request->getPost('a'),
            'obstetric_p' => $this->request->getPost('obstetric_p'),
            'obstetric_a' => $this->request->getPost('obstetric_a'),
            'height' => $this->request->getPost('height'),
            'pregnancy' => $this->request->getPost('pregnancy'),
            'year' => $this->request->getPost('year'),
            'born' => $this->request->getPost('born'),
            'born_app' => $this->request->getPost('born_app'),
            'born_sso' => $this->request->getPost('born_sso'),
            'weight_born' => $this->request->getPost('weight_born'),
            'height_born' => $this->request->getPost('height_born'),
            'head_circ' => $this->request->getPost('head_circ'),
            'birthing_place' => $this->request->getPost('birthing_place'),
            'condition' => $this->request->getPost('condition'),
            'complication' => $complication,
            'child' => $this->request->getPost('child'),
            'gender' => $this->request->getPost('gender'),
            'phone' => $this->request->getPost('phone'),
            'description' => $this->request->getPost('description'),
            'refer' => $refer,
            'desc_refer' => $this->request->getPost('desc_refer'),
            'hecting' => $hecting,
            'day' => date('l'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/parturition')->with('success', 'Partus Berhasil Ditambah');
    }

    public function edit_parturition($id_p)
    {
        $id = user()->id;

        $data = [
            'title' => 'Partus',
            'profile' => $this->userModel->where('id',$id)->first(),
            'partur' => $this->partusModel->select('patients.name, patients.id as pid, partus.*')->join('patients','patients.id=partus.patient_id')->where('partus.id',$id_p)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/partus/edit', $data);
    }

    public function update_parturition()
    {
        $complication = $this->request->getPost('complication');

        if($complication == '1') {
            $rules_desc = 'required';
        } elseif($complication == '2') {
            $rules_desc = 'permit_empty';
        }

        $refer = $this->request->getPost('refer');

        if($refer == '1') {
            $rules_desc_refer = 'required';
        } elseif($refer == '2') {
            $rules_desc_refer = 'permit_empty';
        }

        if(!$this->validate([
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Badan'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Tinggi Badan'
            ],
            'first_day' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Hari Pertama Haid Terakhir'
            ],
            'estimated_day' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'label' => 'Hari Taksiran Persalinan'
            ],
            'date' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam'
            ],
            'blood_group' => [
                'rules' => 'required|in_list[1,2,3,4]',
                'label' => 'Golongan Darah',
                'errors' => [
                    'in_list' => 'Golongan Darah harus dipilih!'
                ]
            ],
            'contraceptive_use' => [
                'rules' => 'required',
                'label' => 'Penggunaan Kontrasepsi Sebelum Hamil'
            ],
            'disease_history' => [
                'rules' => 'required',
                'label' => 'Riwayat Penyakit yang Diderita Ibu'
            ],
            'allergy_history' => [
                'rules' => 'required',
                'label' => 'Riwayat Alergi'
            ],
            'immunization' => [
                'rules' => 'required',
                'label' => 'Status Imunisasi Tetanus Terakhir'
            ],
            'g' => [
                'rules' => 'required',
                'label' => 'G'
            ],
            'p' => [
                'rules' => 'required',
                'label' => 'P'
            ],
            'a' => [
                'rules' => 'required',
                'label' => 'A'
            ],
            'obstetric_p' => [
                'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[11]',
                'label' => 'P'
            ],
            'obstetric_a' => [
                'rules' => 'required|numeric|greater_than_equal_to[1]|less_than[11]',
                'label' => 'A'
            ],
            'pregnancy' => [
                'rules' => 'required|numeric',
                'label' => 'Kehamilan Ke-'
            ],
            'year' => [
                'rules' => 'required|valid_date[Y]',
                'label' => 'Tahun'
            ],
            'born' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Hidup/Mati/Abortus',
                'errors' => [
                    'in_list' => 'Lahir Hidup/Mati/Abortus harus dipilih!'
                ]
            ],
            'born_app' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Aterm/Pre Term/Post Term',
                'errors' => [
                    'in_list' => 'Lahir Aterm/Pre Term/Post Term harus dipilih!'
                ]
            ],
            'born_sso' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Lahir Spontan/SC/Lainnya',
                'errors' => [
                    'in_list' => 'Lahir Spontan/SC/Lainnya Term harus dipilih!'
                ]
            ],
            'weight_born' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Lahir'
            ],
            'height_born' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Lahir'
            ],
            'head_circ' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Lahir'
            ],
            'birthing_place' => [
                'rules' => 'required',
                'label' => 'Tempat Bersalin, Nakes'
            ],
            'condition' => [
                'rules' => 'required',
                'label' => 'Kondisi Anak Saat Ini'
            ],
            'complication' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Komplikasi Kehamilan/Persalinan',
                'errors' => [
                    'in_list' => 'Komplikasi Kehamilan/Persalinan harus dipilih!'
                ]
            ],
            'child' => [
                'rules' => 'required',
                'label' => 'Anak'
            ],
            'gender' => [
                'rules' => 'in_list[1,2]',
                'label' => 'Jenis Kelamin',
                'errors' => [
                    'in_list' => 'Jenis Kelamin harus dipilih!'
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[10]|max_length[13]',
                'label' => 'Nomor HP'
            ],
            'description' => [
                'rules' => $rules_desc,
                'label' => 'Keterangan Komplikasi'
            ],
            'refer' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Rujuk',
                'errors' => [
                    'in_list' => 'Rujuk harus dipilih!'
                ]
            ],
            'desc_refer' => [
                'rules' => $rules_desc_refer,
                'label' => 'Keterangan Rujuk'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Partus Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        if(!isset($_POST['hecting'])) {
            $hecting = 0;
        } else {
            $hecting = 1;
        }

        $first_day = $this->request->getPost('first_day');
        $estimated_day = $this->request->getPost('estimated_day');
        $date = $this->request->getPost('date');

        $tgl_first = substr($first_day,0,2);
        $bln_first = substr($first_day,3,2);
        $thn_first = substr($first_day,6);

        $tgl_esti = substr($estimated_day,0,2);
        $bln_esti = substr($estimated_day,3,2);
        $thn_esti = substr($estimated_day,6);

        $tgl_date = substr($date,0,2);
        $bln_date = substr($date,3,2);
        $thn_date = substr($date,6,4);
        $jam_date = substr($date,11,2);
        $min_date = substr($date,14);

        if($complication == '1') {
            $description = $this->request->getPost('description');
        } else {
            $description = "";
        }

        if($refer == '1') {
            $desc_refer = $this->request->getPost('desc_refer');
        } else {
            $desc_refer = "";
        }

        $this->partusModel->update($id, [
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'first_day' => $thn_first."-".$bln_first."-".$tgl_first,
            'estimated_day' => $thn_esti."-".$bln_esti."-".$tgl_esti,
            'date' => $thn_date."-".$bln_date."-".$tgl_date." ".$jam_date.":".$min_date,
            'blood_group' => $this->request->getPost('blood_group'),
            'contraceptive_use' => $this->request->getPost('contraceptive_use'),
            'disease_history' => $this->request->getPost('disease_history'),
            'allergy_history' => $this->request->getPost('allergy_history'),
            'immunization' => $this->request->getPost('immunization'),
            'g' => $this->request->getPost('g'),
            'p' => $this->request->getPost('p'),
            'a' => $this->request->getPost('a'),
            'obstetric_p' => $this->request->getPost('obstetric_p'),
            'obstetric_a' => $this->request->getPost('obstetric_a'),
            'height' => $this->request->getPost('height'),
            'pregnancy' => $this->request->getPost('pregnancy'),
            'year' => $this->request->getPost('year'),
            'born' => $this->request->getPost('born'),
            'born_app' => $this->request->getPost('born_app'),
            'born_sso' => $this->request->getPost('born_sso'),
            'weight_born' => $this->request->getPost('weight_born'),
            'height_born' => $this->request->getPost('height_born'),
            'head_circ' => $this->request->getPost('head_circ'),
            'birthing_place' => $this->request->getPost('birthing_place'),
            'condition' => $this->request->getPost('condition'),
            'complication' => $complication,
            'child' => $this->request->getPost('child'),
            'gender' => $this->request->getPost('gender'),
            'phone' => $this->request->getPost('phone'),
            'description' => $description,
            'refer' => $refer,
            'desc_refer' => $desc_refer,
            'hecting' => $hecting,
            'day' => date('l'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/parturition')->with('success', 'Partus Berhasil Disimpan');
    }

    public function delete_parturition($id)
    {
        if($this->partusModel->where('id',$id)->delete()) {
            return redirect()->to('admin/parturition')->with('success', 'Partus Berhasil Dihapus');
        }
        
        return redirect()->to('admin/parturition')->with('failed', 'Partus Gagal Dihapus!');
    }

    public function postpartum_mother()
    {
        $id = user()->id;

        $data = [
            'title' => 'Ibu Nifas',
            'profile' => $this->userModel->where('id',$id)->first(),
            'posts' => $this->postmotherModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, postpartum_mother.*')->join('patients','patients.id=postpartum_mother.patient_id')->orderBy('postpartum_mother.created_at','DESC')->asObject()->findAll()
        ];

        return view('admin/post_mother/index', $data);
    }

    public function add_postpartum_mother()
    {
        $id = user()->id;

        $data = [
            'title' => 'Ibu Nifas',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patients' => $this->patientsModel->asObject()->findAll(),
            'validation' => $this->validation
        ];

        return view('admin/post_mother/add', $data);
    }

    public function save_postpartum_mother()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Ibu'
            ],
            'husband' => [
                'rules' => 'required',
                'label' => 'Nama Suami'
            ],
            'visit' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Kunjungan',
                'errors' => [
                    'in_list' => 'Kunjungan harus dipilih!'
                ]
            ],
            'condition' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Kondisi Ibu Secara Umum',
                'errors' => [
                    'in_list' => 'Kondisi Ibu Secara Umum harus dipilih!'
                ]
            ],
            'td' => [
                'rules' => 'required|numeric',
                'label' => 'Tekanan Darah'
            ],
            'body_temp' => [
                'rules' => 'required',
                'label' => 'Suhu Tubuh'
            ],
            'respiration' => [
                'rules' => 'required',
                'label' => 'Respirasi'
            ],
            'pulse' => [
                'rules' => 'required',
                'label' => 'Nadi'
            ],
            'bleeding' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pendarahan Pervagina',
                'errors' => [
                    'in_list' => 'Pendarahan Pervagina harus dipilih!'
                ]
            ],
            'perineum' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Kondisi Perineum',
                'errors' => [
                    'in_list' => 'Kondisi Perineum harus dipilih!'
                ]
            ],
            'infection' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Tanda Infeksi',
                'errors' => [
                    'in_list' => 'Tanda Infeksi harus dipilih!'
                ]
            ],
            'uteri' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Kontraksi Uteri',
                'errors' => [
                    'in_list' => 'Kontraksi Uteri harus dipilih!'
                ]
            ],
            'tfu' => [
                'rules' => 'required',
                'label' => 'TFU'
            ],
            'lokhia' => [
                'rules' => 'required|in_list[1,2,3,4,5,6]',
                'label' => 'Lokhia',
                'errors' => [
                    'in_list' => 'Lokhia harus dipilih!'
                ]
            ],
            'inspection' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Jalan Lahir'
            ],
            'breast' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Payudara'
            ],
            'asi' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Produksi ASI',
                'errors' => [
                    'in_list' => 'Produksi ASI harus dipilih!'
                ]
            ],
            'capsule' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pemberian Kapsul Vit. A',
                'errors' => [
                    'in_list' => 'Pemberian Kapsul Vit. A harus dipilih!'
                ]
            ],
            'contraception' => [
                'rules' => 'required',
                'label' => 'Pelayanan Kontrasepsi Pascapersalinan'
            ],
            'handling' => [
                'rules' => 'required',
                'label' => 'Penanganan Resiko Tinggi dan Komplikasi Pada Nifas'
            ],
            'bab' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'BAB'
            ],
            'bak' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'BAK'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Terapi'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Ibu Nifas Gagal Disimpan!');
        }

        $this->postmotherModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'husband' => $this->request->getPost('husband'),
            'visit' => $this->request->getPost('visit'),
            'condition' => $this->request->getPost('condition'),
            'td' => $this->request->getPost('td'),
            'body_temp' => $this->request->getPost('body_temp'),
            'respiration' => $this->request->getPost('respiration'),
            'pulse' => $this->request->getPost('pulse'),
            'bleeding' => $this->request->getPost('bleeding'),
            'perineum' => $this->request->getPost('perineum'),
            'infection' => $this->request->getPost('infection'),
            'uteri' => $this->request->getPost('uteri'),
            'tfu' => $this->request->getPost('tfu'),
            'lokhia' => $this->request->getPost('lokhia'),
            'inspection' => $this->request->getPost('inspection'),
            'breast' => $this->request->getPost('breast'),
            'asi' => $this->request->getPost('asi'),
            'capsule' => $this->request->getPost('capsule'),
            'contraception' => $this->request->getPost('contraception'),
            'handling' => $this->request->getPost('handling'),
            'bab' => $this->request->getPost('bab'),
            'bak' => $this->request->getPost('bak'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/postpartum_mother')->with('success', 'Data Ibu Nifas Berhasil Disimpan');
    }

    public function edit_postpartum_mother($id_p)
    {
        $id = user()->id;

        $data = [
            'title' => 'Ibu Nifas',
            'profile' => $this->userModel->where('id',$id)->first(),
            'post' => $this->postmotherModel->select('patients.name, patients.id as pid, postpartum_mother.*')->join('patients','patients.id=postpartum_mother.patient_id')->where('postpartum_mother.id',$id_p)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/post_mother/edit', $data);
    }

    public function update_postpartum_mother()
    {
        if(!$this->validate([
            'husband' => [
                'rules' => 'required',
                'label' => 'Nama Suami'
            ],
            'visit' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Kunjungan',
                'errors' => [
                    'in_list' => 'Kunjungan harus dipilih!'
                ]
            ],
            'condition' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Kondisi Ibu Secara Umum',
                'errors' => [
                    'in_list' => 'Kondisi Ibu Secara Umum harus dipilih!'
                ]
            ],
            'td' => [
                'rules' => 'required|numeric',
                'label' => 'Tekanan Darah'
            ],
            'body_temp' => [
                'rules' => 'required',
                'label' => 'Suhu Tubuh'
            ],
            'respiration' => [
                'rules' => 'required',
                'label' => 'Respirasi'
            ],
            'pulse' => [
                'rules' => 'required',
                'label' => 'Nadi'
            ],
            'bleeding' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pendarahan Pervagina',
                'errors' => [
                    'in_list' => 'Pendarahan Pervagina harus dipilih!'
                ]
            ],
            'perineum' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Kondisi Perineum',
                'errors' => [
                    'in_list' => 'Kondisi Perineum harus dipilih!'
                ]
            ],
            'infection' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Tanda Infeksi',
                'errors' => [
                    'in_list' => 'Tanda Infeksi harus dipilih!'
                ]
            ],
            'uteri' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Kontraksi Uteri',
                'errors' => [
                    'in_list' => 'Kontraksi Uteri harus dipilih!'
                ]
            ],
            'tfu' => [
                'rules' => 'required',
                'label' => 'TFU'
            ],
            'lokhia' => [
                'rules' => 'required|in_list[1,2,3,4,5,6]',
                'label' => 'Lokhia',
                'errors' => [
                    'in_list' => 'Lokhia harus dipilih!'
                ]
            ],
            'inspection' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Jalan Lahir'
            ],
            'breast' => [
                'rules' => 'required',
                'label' => 'Pemeriksaan Payudara'
            ],
            'asi' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Produksi ASI',
                'errors' => [
                    'in_list' => 'Produksi ASI harus dipilih!'
                ]
            ],
            'capsule' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pemberian Kapsul Vit. A',
                'errors' => [
                    'in_list' => 'Pemberian Kapsul Vit. A harus dipilih!'
                ]
            ],
            'contraception' => [
                'rules' => 'required',
                'label' => 'Pelayanan Kontrasepsi Pascapersalinan'
            ],
            'handling' => [
                'rules' => 'required',
                'label' => 'Penanganan Resiko Tinggi dan Komplikasi Pada Nifas'
            ],
            'bab' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'BAB'
            ],
            'bak' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'BAK'
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Terapi'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Ibu Nifas Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');

        $this->postmotherModel->update($id, [
            'husband' => $this->request->getPost('husband'),
            'visit' => $this->request->getPost('visit'),
            'condition' => $this->request->getPost('condition'),
            'td' => $this->request->getPost('td'),
            'body_temp' => $this->request->getPost('body_temp'),
            'respiration' => $this->request->getPost('respiration'),
            'pulse' => $this->request->getPost('pulse'),
            'bleeding' => $this->request->getPost('bleeding'),
            'perineum' => $this->request->getPost('perineum'),
            'infection' => $this->request->getPost('infection'),
            'uteri' => $this->request->getPost('uteri'),
            'tfu' => $this->request->getPost('tfu'),
            'lokhia' => $this->request->getPost('lokhia'),
            'inspection' => $this->request->getPost('inspection'),
            'breast' => $this->request->getPost('breast'),
            'asi' => $this->request->getPost('asi'),
            'capsule' => $this->request->getPost('capsule'),
            'contraception' => $this->request->getPost('contraception'),
            'handling' => $this->request->getPost('handling'),
            'bab' => $this->request->getPost('bab'),
            'bak' => $this->request->getPost('bak'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/postpartum_mother')->with('success', 'Data Ibu Nifas Berhasil Disimpan');
    }

    public function delete_postpartum_mother($id)
    {
        if($this->postmotherModel->where('id',$id)->delete()) {
            return redirect()->to('admin/postpartum_mother')->with('success', 'Data Ibu Nifas Berhasil Dihapus');
        }
        
        return redirect()->to('admin/postpartum_mother')->with('failed', 'Data Ibu Nifas Gagal Dihapus!');
    }

    public function baby()
    {
        $id = user()->id;

        $data = [
            'title' => 'Bayi Saat Lahir',
            'profile' => $this->userModel->where('id',$id)->first(),
            'babies' => $this->babyModel->select('patients.id as pid, patients.name, patients.age, patients.address, baby_at_birth.*')->join('patients','patients.id=baby_at_birth.patient_id')->orderBy('baby_at_birth.created_at','DESC')->asObject()->findAll()
        ];

        return view('admin/baby/index', $data);
    }

    public function add_baby()
    {
        $id = user()->id;

        $data = [
            'title' => 'Bayi Saat Lahir',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patients' => $this->patientsModel->asObject()->findAll(),
            'validation' => $this->validation
        ];

        return view('admin/baby/add', $data);
    }

    public function save_baby()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'husband_name' => [
                'rules' => 'required|alpha_space',
                'label' => 'Nama Suami'
            ],
            'datetime' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam Persalinan'
            ],
            'gestational_age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur Kehamilan'
            ],
            'birth_attendant' => [
                'rules' => 'required',
                'label' => 'Penolong Persalinan'
            ],
            'how' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Cara Persalinan',
                'errors' => [
                    'in_list' => 'Cara Persalinan harus dipilih!'
                ]
            ],
            'condition' => [
                'rules' => 'required|in_list[1,2,3,4,5,6]',
                'label' => 'Keadaan Ibu',
                'errors' => [
                    'in_list' => 'Keadaan Ibu harus dipilih!'
                ]
            ],
            'add_info' => [
                'rules' => 'required',
                'label' => 'Keterangan Tambahan'
            ],
            'child' => [
                'rules' => 'required|numeric',
                'label' => 'Anak Ke'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Lahir'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Badan'
            ],
            'head' => [
                'rules' => 'required|numeric',
                'label' => 'Lingkar Kepala'
            ],
            'gender' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Jenis Kelamin'
            ],
            'add_info2' => [
                'rules' => 'required',
                'label' => 'Keterangan Tambahan'
            ],
            'temp' => [
                'rules' => 'required|numeric',
                'label' => 'Suhu'
            ],
            'ikterik' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Ikterik',
                'errors' => [
                    'in_list' => 'Ikterik harus dipilih!'
                ]
            ],
            'navel' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pusar',
                'errors' => [
                    'in_list' => 'Pusar harus dipilih!'
                ]
            ],
            'feed' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Menyusui',
                'errors' => [
                    'in_list' => 'Menyusui harus dipilih!'
                ]
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Bayi Saat Lahir Gagal Disimpan!');
        }

        $datetime = $this->request->getPost('datetime');

        $tgl_datetime = substr($datetime,0,2);
        $bln_datetime = substr($datetime,3,2);
        $thn_datetime = substr($datetime,6,4);
        $jam_datetime = substr($datetime,11,2);
        $min_datetime = substr($datetime,14);

        if(isset($_POST['condition_1'])) {
            $condition_1 = $this->request->getPost('condition_1');
        } else {
            $condition_1 = 0;
        }
        if(isset($_POST['condition_2'])) {
            $condition_2 = $this->request->getPost('condition_2');
        } else {
            $condition_2 = 0;
        }
        if(isset($_POST['condition_3'])) {
            $condition_3 = $this->request->getPost('condition_3');
        } else {
            $condition_3 = 0;
        }
        if(isset($_POST['condition_4'])) {
            $condition_4 = $this->request->getPost('condition_4');
        } else {
            $condition_4 = 0;
        }
        if(isset($_POST['condition_5'])) {
            $condition_5 = $this->request->getPost('condition_5');
        } else {
            $condition_5 = 0;
        }
        if(isset($_POST['condition_6'])) {
            $condition_6 = $this->request->getPost('condition_6');
        } else {
            $condition_6 = 0;
        }
        if(isset($_POST['condition_7'])) {
            $condition_7 = $this->request->getPost('condition_7');
        } else {
            $condition_7 = 0;
        }
        if(isset($_POST['condition_8'])) {
            $condition_8 = $this->request->getPost('condition_8');
        } else {
            $condition_8 = 0;
        }

        if(isset($_POST['care_1'])) {
            $care_1 = $this->request->getPost('care_1');
        } else {
            $care_1 = 0;
        }
        if(isset($_POST['care_2'])) {
            $care_2 = $this->request->getPost('care_2');
        } else {
            $care_2 = 0;
        }
        if(isset($_POST['care_3'])) {
            $care_3 = $this->request->getPost('care_3');
        } else {
            $care_3 = 0;
        }
        if(isset($_POST['care_4'])) {
            $care_4 = $this->request->getPost('care_4');
        } else {
            $care_4 = 0;
        }

        $this->babyModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'husband_name' => $this->request->getPost('husband_name'),
            'datetime' => $thn_datetime."-".$bln_datetime."-".$tgl_datetime." ".$jam_datetime.":".$min_datetime,
            'gestational_age' => $this->request->getPost('gestational_age'),
            'birth_attendant' => $this->request->getPost('birth_attendant'),
            'how' => $this->request->getPost('how'),
            'condition' => $this->request->getPost('condition'),
            'add_info' => $this->request->getPost('add_info'),
            'child' => $this->request->getPost('child'),
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'head' => $this->request->getPost('head'),
            'gender' => $this->request->getPost('gender'),
            'gender' => $this->request->getPost('gender'),
            'condition_1' => $condition_1,
            'condition_2' => $condition_2,
            'condition_3' => $condition_3,
            'condition_4' => $condition_4,
            'condition_5' => $condition_5,
            'condition_6' => $condition_6,
            'condition_7' => $condition_7,
            'condition_8' => $condition_8,
            'care_1' => $care_1,
            'care_2' => $care_2,
            'care_3' => $care_3,
            'care_4' => $care_4,
            'add_info2' => $this->request->getPost('add_info2'),
            'temp' => $this->request->getPost('temp'),
            'ikterik' => $this->request->getPost('ikterik'),
            'navel' => $this->request->getPost('navel'),
            'feed' => $this->request->getPost('feed'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/baby_at_birth')->with('success', 'Data Bayi Saat Lahir Berhasil Disimpan');
    }

    public function edit_baby($id_b)
    {
        $id = user()->id;

        $data = [
            'title' => 'Bayi Saat Lahir',
            'profile' => $this->userModel->where('id',$id)->first(),
            'baby' => $this->babyModel->select('patients.id as pid, patients.name, baby_at_birth.*')->join('patients','patients.id=baby_at_birth.patient_id')->where('baby_at_birth.id',$id_b)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/baby/edit', $data);
    }

    public function update_baby()
    {
        if(!$this->validate([
            'husband_name' => [
                'rules' => 'required|alpha_space',
                'label' => 'Nama Suami'
            ],
            'datetime' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam Persalinan'
            ],
            'gestational_age' => [
                'rules' => 'required|numeric',
                'label' => 'Umur Kehamilan'
            ],
            'birth_attendant' => [
                'rules' => 'required',
                'label' => 'Penolong Persalinan'
            ],
            'how' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Cara Persalinan',
                'errors' => [
                    'in_list' => 'Cara Persalinan harus dipilih!'
                ]
            ],
            'condition' => [
                'rules' => 'required|in_list[1,2,3,4,5,6]',
                'label' => 'Keadaan Ibu',
                'errors' => [
                    'in_list' => 'Keadaan Ibu harus dipilih!'
                ]
            ],
            'add_info' => [
                'rules' => 'required',
                'label' => 'Keterangan Tambahan'
            ],
            'child' => [
                'rules' => 'required|numeric',
                'label' => 'Anak Ke'
            ],
            'weight' => [
                'rules' => 'required|numeric',
                'label' => 'Berat Lahir'
            ],
            'height' => [
                'rules' => 'required|numeric',
                'label' => 'Panjang Badan'
            ],
            'head' => [
                'rules' => 'required|numeric',
                'label' => 'Lingkar Kepala'
            ],
            'gender' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Jenis Kelamin'
            ],
            'add_info2' => [
                'rules' => 'required',
                'label' => 'Keterangan Tambahan'
            ],
            'temp' => [
                'rules' => 'required|numeric',
                'label' => 'Suhu'
            ],
            'ikterik' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Ikterik',
                'errors' => [
                    'in_list' => 'Ikterik harus dipilih!'
                ]
            ],
            'navel' => [
                'rules' => 'required|in_list[1,2]',
                'label' => 'Pusar',
                'errors' => [
                    'in_list' => 'Pusar harus dipilih!'
                ]
            ],
            'feed' => [
                'rules' => 'required|in_list[1,2,3]',
                'label' => 'Menyusui',
                'errors' => [
                    'in_list' => 'Menyusui harus dipilih!'
                ]
            ],
            'complaint' => [
                'rules' => 'required',
                'label' => 'Keluhan'
            ],
            'therapy' => [
                'rules' => 'required',
                'label' => 'Therapy'
            ],
            'price' => [
                'rules' => 'required|numeric',
                'label' => 'Harga'
            ],
            'examiner' => [
                'rules' => 'required',
                'label' => 'Nama Pemeriksa'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Bayi Saat Lahir Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');
        $datetime = $this->request->getPost('datetime');

        $tgl_datetime = substr($datetime,0,2);
        $bln_datetime = substr($datetime,3,2);
        $thn_datetime = substr($datetime,6,4);
        $jam_datetime = substr($datetime,11,2);
        $min_datetime = substr($datetime,14);

        if(isset($_POST['condition_1'])) {
            $condition_1 = $this->request->getPost('condition_1');
        } else {
            $condition_1 = 0;
        }
        if(isset($_POST['condition_2'])) {
            $condition_2 = $this->request->getPost('condition_2');
        } else {
            $condition_2 = 0;
        }
        if(isset($_POST['condition_3'])) {
            $condition_3 = $this->request->getPost('condition_3');
        } else {
            $condition_3 = 0;
        }
        if(isset($_POST['condition_4'])) {
            $condition_4 = $this->request->getPost('condition_4');
        } else {
            $condition_4 = 0;
        }
        if(isset($_POST['condition_5'])) {
            $condition_5 = $this->request->getPost('condition_5');
        } else {
            $condition_5 = 0;
        }
        if(isset($_POST['condition_6'])) {
            $condition_6 = $this->request->getPost('condition_6');
        } else {
            $condition_6 = 0;
        }
        if(isset($_POST['condition_7'])) {
            $condition_7 = $this->request->getPost('condition_7');
        } else {
            $condition_7 = 0;
        }
        if(isset($_POST['condition_8'])) {
            $condition_8 = $this->request->getPost('condition_8');
        } else {
            $condition_8 = 0;
        }

        if(isset($_POST['care_1'])) {
            $care_1 = $this->request->getPost('care_1');
        } else {
            $care_1 = 0;
        }
        if(isset($_POST['care_2'])) {
            $care_2 = $this->request->getPost('care_2');
        } else {
            $care_2 = 0;
        }
        if(isset($_POST['care_3'])) {
            $care_3 = $this->request->getPost('care_3');
        } else {
            $care_3 = 0;
        }
        if(isset($_POST['care_4'])) {
            $care_4 = $this->request->getPost('care_4');
        } else {
            $care_4 = 0;
        }

        $this->babyModel->update($id, [
            'husband_name' => $this->request->getPost('husband_name'),
            'datetime' => $thn_datetime."-".$bln_datetime."-".$tgl_datetime." ".$jam_datetime.":".$min_datetime,
            'gestational_age' => $this->request->getPost('gestational_age'),
            'birth_attendant' => $this->request->getPost('birth_attendant'),
            'how' => $this->request->getPost('how'),
            'condition' => $this->request->getPost('condition'),
            'add_info' => $this->request->getPost('add_info'),
            'child' => $this->request->getPost('child'),
            'weight' => $this->request->getPost('weight'),
            'height' => $this->request->getPost('height'),
            'head' => $this->request->getPost('head'),
            'gender' => $this->request->getPost('gender'),
            'gender' => $this->request->getPost('gender'),
            'condition_1' => $condition_1,
            'condition_2' => $condition_2,
            'condition_3' => $condition_3,
            'condition_4' => $condition_4,
            'condition_5' => $condition_5,
            'condition_6' => $condition_6,
            'condition_7' => $condition_7,
            'condition_8' => $condition_8,
            'care_1' => $care_1,
            'care_2' => $care_2,
            'care_3' => $care_3,
            'care_4' => $care_4,
            'add_info2' => $this->request->getPost('add_info2'),
            'temp' => $this->request->getPost('temp'),
            'ikterik' => $this->request->getPost('ikterik'),
            'navel' => $this->request->getPost('navel'),
            'feed' => $this->request->getPost('feed'),
            'complaint' => $this->request->getPost('complaint'),
            'therapy' => $this->request->getPost('therapy'),
            'price' => $this->request->getPost('price'),
            'examiner' => $this->request->getPost('examiner'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/baby_at_birth')->with('success', 'Data Bayi Saat Lahir Berhasil Disimpan');
    }

    public function delete_baby($id)
    {
        if($this->babyModel->where('id',$id)->delete()) {
            return redirect()->to('admin/baby_at_birth')->with('success', 'Data Bayi Saat Lahir Berhasil Dihapus');
        }
        
        return redirect()->to('admin/baby_at_birth')->with('failed', 'Data Bayi Saat Lahir Gagal Dihapus!');
    }

    public function ref()
    {
        $id = user()->id;

        $data = [
            'title' => 'Rujukan',
            'profile' => $this->userModel->where('id',$id)->first(),
            'refs' => $this->refModel->select('patients.id as pid, patients.name, patients.age, patients.address, reference.*')->join('patients','patients.id=reference.patient_id')->orderBy('reference.created_at','DESC')->asObject()->findAll()
        ];

        return view('admin/ref/index', $data);
    }

    public function add_ref()
    {
        $id = user()->id;

        $data = [
            'title' => 'Rujukan',
            'profile' => $this->userModel->where('id',$id)->first(),
            'patients' => $this->patientsModel->asObject()->findAll(),
            'validation' => $this->validation
        ];

        return view('admin/ref/add', $data);
    }

    public function save_ref()
    {
        if(!$this->validate([
            'patient_id' => [
                'rules' => 'required',
                'label' => 'Nama Pasien'
            ],
            'husband' => [
                'rules' => 'required',
                'label' => 'Suami'
            ],
            'datetime' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam'
            ],
            'ref_to' => [
                'rules' => 'required',
                'label' => 'Dirujuk Ke'
            ],
            'cause' => [
                'rules' => 'required',
                'label' => 'Sebab Dirujuk'
            ],
            'diagnose' => [
                'rules' => 'required',
                'label' => 'Diagnosa Sementara'
            ],
            'act' => [
                'rules' => 'required',
                'label' => 'Tindakan Sementara'
            ],
            'who' => [
                'rules' => 'required',
                'label' => 'Yang Merujuk'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Rujukan Gagal Disimpan!');
        }

        $datetime = $this->request->getPost('datetime');

        $tgl_datetime = substr($datetime,0,2);
        $bln_datetime = substr($datetime,3,2);
        $thn_datetime = substr($datetime,6,4);
        $jam_datetime = substr($datetime,11,2);
        $min_datetime = substr($datetime,14);

        $this->refModel->insert([
            'patient_id' => $this->request->getPost('patient_id'),
            'husband' => $this->request->getPost('husband'),
            'datetime' => $thn_datetime."-".$bln_datetime."-".$tgl_datetime." ".$jam_datetime.":".$min_datetime,
            'ref_to' => $this->request->getPost('ref_to'),
            'cause' => $this->request->getPost('cause'),
            'diagnose' => $this->request->getPost('diagnose'),
            'act' => $this->request->getPost('act'),
            'who' => $this->request->getPost('who'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/reference')->with('success', 'Data Rujukan Berhasil Disimpan');
    }

    public function edit_ref($id_r)
    {
        $id = user()->id;

        $data = [
            'title' => 'Rujukan',
            'profile' => $this->userModel->where('id',$id)->first(),
            'ref' => $this->refModel->select('patients.id as pid, patients.name, reference.*')->join('patients','patients.id=reference.patient_id')->where('reference.id',$id_r)->asObject()->first(),
            'validation' => $this->validation
        ];

        return view('admin/ref/edit', $data);
    }

    public function update_ref()
    {
        if(!$this->validate([
            'husband' => [
                'rules' => 'required',
                'label' => 'Suami'
            ],
            'datetime' => [
                'rules' => 'required|valid_date[d/m/Y H.i]',
                'label' => 'Tanggal dan Jam'
            ],
            'ref_to' => [
                'rules' => 'required',
                'label' => 'Dirujuk Ke'
            ],
            'cause' => [
                'rules' => 'required',
                'label' => 'Sebab Dirujuk'
            ],
            'diagnose' => [
                'rules' => 'required',
                'label' => 'Diagnosa Sementara'
            ],
            'act' => [
                'rules' => 'required',
                'label' => 'Tindakan Sementara'
            ],
            'who' => [
                'rules' => 'required',
                'label' => 'Yang Merujuk'
            ]
        ])) {
            return redirect()->back()->withInput()->with('failed', 'Data Rujukan Gagal Disimpan!');
        }

        $id = $this->request->getPost('id');
        $datetime = $this->request->getPost('datetime');

        $tgl_datetime = substr($datetime,0,2);
        $bln_datetime = substr($datetime,3,2);
        $thn_datetime = substr($datetime,6,4);
        $jam_datetime = substr($datetime,11,2);
        $min_datetime = substr($datetime,14);

        $this->refModel->update($id, [
            'husband' => $this->request->getPost('husband'),
            'datetime' => $thn_datetime."-".$bln_datetime."-".$tgl_datetime." ".$jam_datetime.":".$min_datetime,
            'ref_to' => $this->request->getPost('ref_to'),
            'cause' => $this->request->getPost('cause'),
            'diagnose' => $this->request->getPost('diagnose'),
            'act' => $this->request->getPost('act'),
            'who' => $this->request->getPost('who'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/reference')->with('success', 'Data Rujukan Berhasil Disimpan');
    }

    public function delete_ref($id)
    {
        if($this->refModel->where('id',$id)->delete()) {
            return redirect()->to('admin/reference')->with('success', 'Data Rujukan Berhasil Dihapus');
        }
        
        return redirect()->to('admin/reference')->with('failed', 'Data Rujukan Gagal Dihapus!');
    }

    public function print_ref($id)
    {
        $data = [
            'ref' => $this->refModel->select('patients.id as pid, patients.name, patients.age, patients.address, reference.*')->join('patients','patients.id=reference.patient_id')->where('reference.id',$id)->asObject()->first()
        ];

        return view('admin/ref/print', $data);
    }

    public function report()
    {
        $id = user()->id;

        $data = [
            'title' => 'Laporan',
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        if(isset($_GET['start'])) {
            if(!$this->validate([
                'start' => [
                    'rules' => 'required|valid_date[d/m/Y]',
                    'label' => 'Tanggal Mulai'
                ],
                'end' => [
                    'rules' => 'required|valid_date[d/m/Y]',
                    'label' => 'Tanggal Akhir'
                ],
                'menu' => [
                    'rules' => 'required|in_list[1,2,3,4,5,6,7,8,9]',
                    'label' => 'Data',
                    'errors' => [
                        'in_list' => 'Data harus dipilih!'
                    ]
                ]
            ])) {
                return redirect()->back()->withInput()->with('failed', 'Data Gagal Dilihat!');
            }

            $menu = $this->request->getGet('menu');

            $start = $this->request->getGet('start');
            $tgl_start = substr($start,0,2);
            $bln_start = substr($start,3,2);
            $thn_start = substr($start,6);

            $end = $this->request->getGet('end');
            $tgl_end = substr($end,0,2);
            $bln_end = substr($end,3,2);
            $thn_end = substr($end,6);

            $awal_fix = $thn_start."-".$bln_start."-".$tgl_start." 00:00:00";
            $end_fix = $thn_end."-".$bln_end."-".$tgl_end." 23:59:59";

            if($menu == '1') {
                $data['data'] = $this->treatmentsModel->select('treatments.*, patients.name, patients.id as pid')->where(['treatments.created_at >=' => $awal_fix, 'treatments.created_at <=' => $end_fix])->join('patients','treatments.patient_id=patients.id')->orderBy('treatments.created_at','DESC')->asObject()->findAll();
                $data['menu'] = '1';
            } elseif($menu == '2') {
                $data['data'] = $this->familyplanningsModel->select('patients.name, patients.age, patients.head_of_family, patients.address, patients.id as pid, family_plannings.*')->join('patients','family_plannings.patient_id=patients.id')->orderBy('family_plannings.created_at','DESC')->where(['family_plannings.created_at >=' => $awal_fix, 'family_plannings.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '2';
            } elseif($menu == '3') {
                $data['data'] = $this->ancusgModel->select('patients.name, patients.id as pid, patients.age, anc_usg.*')->join('patients','anc_usg.patient_id=patients.id')->orderBy('anc_usg.created_at','DESC')->where(['anc_usg.created_at >=' => $awal_fix, 'anc_usg.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '3';
            } elseif($menu == '4') {
                $data['data'] = $this->partusModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, partus.*')->join('patients','patients.id=partus.patient_id')->orderBy('partus.created_at','DESC')->where(['partus.created_at >=' => $awal_fix, 'partus.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '4';
            } elseif($menu == '5') {
                $data['data'] = $this->immunizationModel->select('immunizations.*, patients.name, patients.id as pid')->join('patients','patients.id=immunizations.patient_id')->orderBy('immunizations.created_at','DESC')->where(['immunizations.created_at >=' => $awal_fix, 'immunizations.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '5';
            } elseif($menu == '6') {
                $data['data'] = $this->postmotherModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, postpartum_mother.*')->join('patients','patients.id=postpartum_mother.patient_id')->orderBy('postpartum_mother.created_at','DESC')->where(['postpartum_mother.created_at >=' => $awal_fix, 'postpartum_mother.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '6';
            } elseif($menu == '7') {
                $data['data'] = $this->babyModel->select('patients.id as pid, patients.name, patients.age, patients.address, baby_at_birth.*')->join('patients','patients.id=baby_at_birth.patient_id')->orderBy('baby_at_birth.created_at','DESC')->where(['baby_at_birth.created_at >=' => $awal_fix, 'baby_at_birth.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '7';
            } elseif($menu == '8') {
                $data['data'] = $this->refModel->select('patients.id as pid, patients.name, patients.age, patients.address, reference.*')->join('patients','patients.id=reference.patient_id')->orderBy('reference.created_at','DESC')->where(['reference.created_at >=' => $awal_fix, 'reference.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '8';
            } elseif($menu == '9') {
                $data['data'] = $this->rapidsModel->select('rapids.*, patients.name, patients.id as pid')->join('patients','patients.id=rapids.patient_id')->orderBy('rapids.created_at')->where(['rapids.created_at >=' => $awal_fix, 'rapids.created_at <=' => $end_fix])->asObject()->findAll();
                $data['menu'] = '9';
            }
        }

        return view('admin/report/index', $data);
    }

    public function print_report()
    {
        $id = user()->id;

        $data = [
            'title' => 'Laporan',
            'profile' => $this->userModel->where('id',$id)->first(),
            'validation' => $this->validation
        ];

        $menu = $this->request->getGet('menu');

        $start = $this->request->getGet('start');
        $tgl_start = substr($start,0,2);
        $bln_start = substr($start,3,2);
        $thn_start = substr($start,6);

        $end = $this->request->getGet('end');
        $tgl_end = substr($end,0,2);
        $bln_end = substr($end,3,2);
        $thn_end = substr($end,6);

        $awal_fix = $thn_start."-".$bln_start."-".$tgl_start." 00:00:00";
        $end_fix = $thn_end."-".$bln_end."-".$tgl_end." 23:59:59";

        if($menu == '1') {
            $data['data'] = $this->treatmentsModel->select('treatments.*, patients.name, patients.id as pid')->where(['treatments.created_at >=' => $awal_fix, 'treatments.created_at <=' => $end_fix])->join('patients','treatments.patient_id=patients.id')->orderBy('treatments.created_at','DESC')->asObject()->findAll();
            $data['menu'] = '1';
        } elseif($menu == '2') {
            $data['data'] = $this->familyplanningsModel->select('patients.name, patients.age, patients.head_of_family, patients.address, patients.id as pid, family_plannings.*')->join('patients','family_plannings.patient_id=patients.id')->orderBy('family_plannings.created_at','DESC')->where(['family_plannings.created_at >=' => $awal_fix, 'family_plannings.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '2';
        } elseif($menu == '3') {
            $data['data'] = $this->ancusgModel->select('patients.name, patients.id as pid, patients.age, anc_usg.*')->join('patients','anc_usg.patient_id=patients.id')->orderBy('anc_usg.created_at','DESC')->where(['anc_usg.created_at >=' => $awal_fix, 'anc_usg.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '3';
        } elseif($menu == '4') {
            $data['data'] = $this->partusModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, partus.*')->join('patients','patients.id=partus.patient_id')->orderBy('partus.created_at','DESC')->where(['partus.created_at >=' => $awal_fix, 'partus.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '4';
        } elseif($menu == '5') {
            $data['data'] = $this->immunizationModel->select('immunizations.*, patients.name, patients.id as pid')->join('patients','patients.id=immunizations.patient_id')->orderBy('immunizations.created_at','DESC')->where(['immunizations.created_at >=' => $awal_fix, 'immunizations.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '5';
        } elseif($menu == '6') {
            $data['data'] = $this->postmotherModel->select('patients.id as pid, patients.name, patients.age, patients.head_of_family, patients.address, postpartum_mother.*')->join('patients','patients.id=postpartum_mother.patient_id')->orderBy('postpartum_mother.created_at','DESC')->where(['postpartum_mother.created_at >=' => $awal_fix, 'postpartum_mother.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '6';
        } elseif($menu == '7') {
            $data['data'] = $this->babyModel->select('patients.id as pid, patients.name, patients.age, patients.address, baby_at_birth.*')->join('patients','patients.id=baby_at_birth.patient_id')->orderBy('baby_at_birth.created_at','DESC')->where(['baby_at_birth.created_at >=' => $awal_fix, 'baby_at_birth.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '7';
        } elseif($menu == '8') {
            $data['data'] = $this->refModel->select('patients.id as pid, patients.name, patients.age, patients.address, reference.*')->join('patients','patients.id=reference.patient_id')->orderBy('reference.created_at','DESC')->where(['reference.created_at >=' => $awal_fix, 'reference.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '8';
        } elseif($menu == '9') {
            $data['data'] = $this->rapidsModel->select('rapids.*, patients.name, patients.id as pid')->join('patients','patients.id=rapids.patient_id')->orderBy('rapids.created_at')->where(['rapids.created_at >=' => $awal_fix, 'rapids.created_at <=' => $end_fix])->asObject()->findAll();
            $data['menu'] = '9';
        }

        return view('admin/report/print', $data);
    }
}