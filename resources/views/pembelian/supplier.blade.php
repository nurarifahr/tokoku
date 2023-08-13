<div class="modal fade" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="modal-supplier">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Pilih Supplier</h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered">
            <thead>
              <th width="5%">No</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th><i class="fa fa-cog"></i></th>
            </thead>
            <tbody>
              @foreach ($supplier as $key => $item)
                  <tr>
                    <td width="5%">{{ $key+1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->telepon}}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                      <a href="{{ route('pembelian.create', $item->id_supplier) }}" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-check-circle"> Pilih</i></a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>      
        </div>
      </div>          
  </div>
</div>