<?php

return [
  'user' => [
    'identityClass' => 'app\models\User', // Replace with your user model namespace
    'enableAutoLogin' => true,
    'authKey' => 'your-app-secret-key', // Replace with a strong secret key for authentication
  ],
  'as authManager' => [
    'class' => 'yii\rbac\DbManager', // Use database for RBAC rules
  ],
  // Add roles and permissions
  'roles' => [
    'admin' => [
      'viewTransactions' => true, // Permission for 'Transaksi' access
      'viewInformation' => true, // Permission for 'Informasi' access
      'viewWilayah' => true,      // Permission for 'Wilayah' access
      'viewPegawai' => true,       // Permission for 'Pegawai' access
      'viewTindakan' => true,      // Permission for 'Tindakan' access
      'viewObat' => true,          // Permission for 'Obat' access
      // ... other permissions for admin
    ],
    'dokter' => [
      'viewTransactions' => true, // Permission for some roles (adjust as needed)
      'viewPegawai' => true,       // Permission for 'Pegawai' access (optional for dokter role)
      'viewTindakan' => true,      // Permission for 'Tindakan' access (optional for dokter role)
      // ... other permissions for dokter
    ],
    // ... other roles with their permissions (add more roles as needed)
  ],
  // Define permissions (optional, roles can inherit from permissions)
  'permissions' => [
    'viewTransactions' => [
      'description' => 'View transactions', // Optional description for the permission
    ],
    'viewInformation' => [
      'description' => 'View information', // Optional description for the permission
    ],
    'viewWilayah' => [
      'description' => 'View wilayah data', // Optional description for the permission
    ],
    'viewPegawai' => [
      'description' => 'View pegawai data', // Optional description for the permission
    ],
    'viewTindakan' => [
      'description' => 'View tindakan data', // Optional description for the permission
    ],
    'viewObat' => [
      'description' => 'View obat data', // Optional description for the permission
    ],
    // ... define other permissions as needed
  ],
];
