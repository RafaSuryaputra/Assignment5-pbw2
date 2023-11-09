<x-app-layout>
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{ __('Detail Transaksi') }}
      </h2>
  </x-slot>

<!-- RAFA SURYAPUTRA - 6706223162 -->

  <script type="text/javascript">
    $(document).ready(function () {
        $('.yajra-datatable-transactions').DataTable({
          ajax: '{{ url("getAllDetailTransactions") }}'+"/"+{{ $transactions->id }},
          serverSide: false,
          processing: true,
          deferRender: true,
          type: 'GET',
          destroy:true,
          columns: [
            {data:'id', name: 'id'},
            {data:'koleksi', name: 'koleksi'},
            {data:'tanggalPinjam', name: 'tanggalPinjam'},
            {data:'tanggalKembali', name: 'tanggalKembali'},
            {data:'status', name: 'status'},
            {data:'action', name: 'action'}
          ]
      });
    });
  </script>
  <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- <div>
                  <x-input-label for="peminjam" :value="__('Peminjam')" />
  
                  <x-text-input id="peminjam" class="block w-full mt-1" type="text" name="peminjam" :value="{{ $transactions->fullnamePeminjam }}" autocomplete="off" readonly/>
  
                  <x-input-error :messages="$errors->get('peminjam')" class="mt-2" />
                </div>
                <div>
                  <x-input-label for="petugas" :value="__('Petugas')" />
  
                  <x-text-input id="petugas" class="block w-full mt-1" type="text" name="petugas" :value="{{ $transactions->fullnamePetugas }}" autocomplete="off" readonly/>
  
                  <x-input-error :messages="$errors->get('petugas')" class="mt-2" />
                </div> --}}
              
              <div class="container">
                  <div class="row form-group">
                    <label for="peminjam" class="form-label">Peminjam</label>
                    <input type="text" name="peminjam" id="peminjam" class="form-control" autocomplete="off" value="{{ $transactions->fullnamePeminjam }}" readonly>
                  </div>
                  <div class="row form-group">
                    <label for="petugas" class="form-label">Petugas</label>
                    <input type="text" name="petugas" id="petugas" class="form-control" autocomplete="off" value="{{ $transactions->fullnamePetugas }}" readonly>
                  </div>
                  <div class="row form-group">
                    <table class="table table-bordered yajra-datatable-transactions">
                      <thead>
                          <tr>
                              <th>No</th>  
                              <th>Koleksi</th>
                              <th>Tanggal Pinjam</th>  
                              <th>Tanggal Kembali</th>  
                              <th>Status</th>
                              <th>Opsi</th>  
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                  </div>
                  
              </div>
            </div>
          </div>
      </div>
  </div>
</x-app-layout>
