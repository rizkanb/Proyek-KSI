<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['setting_key', 'setting_value'];

    /**
     * Mengambil nilai pengaturan berdasarkan key
     */
    public function getSetting($key)
    {
        $builder = $this->where('setting_key', $key)->first();
        return $builder ? $builder['setting_value'] : null;
    }

    /**
     * Menyimpan atau memperbarui nilai pengaturan berdasarkan key
     */
    public function saveSetting($key, $value)
    {
        $data = $this->where('setting_key', $key)->first();

        if ($data) {
            // Jika data ada (update)
            $this->update($data['id'], ['setting_value' => $value]);
        } else {
            // Jika data baru (insert)
            $this->save([
                'setting_key'   => $key,
                'setting_value' => $value
            ]);
        }
    }
}
