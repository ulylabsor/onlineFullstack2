<h3>Data Users
   <a href="?page=add-users" class="btn btn-outline-info float-right"><i class="fa fa-plus"></i> Tambah Data</a>
</h3>
<?php tampilNotif() ?>
<table class="table table-striped">
   <thead>
      <tr>
         <th scope="col">#</th>
         <th scope="col">Username</th>
         <th scope="col">Email</th>
         <th scope="col">Level</th>
         <th scope="col">Status</th>
         <th scope="col">Last login</th>
         <th scope="col">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $no = 1;
      foreach (getUsers() as $data) : ?>
         <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $data['username'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['level'] ?></td>
            <td><?= $data['status'] == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
            <td><?= $data['login_at'] ?></td>
            <td>
               <a href="#" title="Ubah data"><i class="fa fa-edit text-info"></i></a> &nbsp;
               <a href="#" title="Hapus data"><i class="fa fa-trash text-danger"></i></a>
            </td>
         </tr>
      <?php endforeach ?>
   </tbody>
</table>