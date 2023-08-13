<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">

        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="nama_produk">Nama</label>
                    <div class="col-md-6">
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="id_kategori">Kategori</label>
                    <div class="col-md-6">
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                          <option value="">Pilih Kategori</option>
                          @foreach($kategori as $key => $item)
                          <option value="{{ $key }}">{{ $item }}</option>
                          @endforeach
                        </select>
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="merk">Merk</label>
                    <div class="col-md-6">
                        <input type="text" name="merk" id="merk" class="form-control">
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="harga_beli">Harga Beli</label>
                    <div class="col-md-6">
                        <input type="number" name="harga_beli" id="harga_beli" class="form-control">
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="harga_jual">Harga Jual</label>
                    <div class="col-md-6">
                        <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="diskon">Diskon</label>
                    <div class="col-md-6">
                        <input type="number" name="diskon" id="diskon" class="form-control" value="0">
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-md-offset-1 control-label" for="stok">Stok</label>
                    <div class="col-md-6">
                        <input type="number" name="stok" id="stok" class="form-control" required value="0">
                        <span class="help-block with-errors"></span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
              </div>
        </form>
    </div>
</div>