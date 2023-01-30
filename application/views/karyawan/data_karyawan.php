<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header">
                <b>Data Karyawan</b>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- foreach data karyawan -->
                    <div class="col-md-3">
                        <div class="panel text-center">
                            <div class="panel-body">
                                <img alt="Avatar" class="img-md img-circle img-border mar-btm" src="https://bootdey.com/img/Content/avatar/avatar4.png">
                                <h4 class="mar-no">Brenda Fuller</h4>
                                <p>Project manager</p>
                            </div>
                            <div class="pad-all">
                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                                <div class="pad-btm">
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-success">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- foreach -->
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href=""><img class="avatar" src="<?= base_url('assets') ?>/img/user-03.jpg" alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href=><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete-data{{ $data->id }}">
                                        <i class="fas fa-trash-alt m-r-5"></i> Delete
                                    </button>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="{{ route('karyawan.show',$data->id) }}">eddy</a>
                            </h4>
                            <div class="small text-muted">IT</div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete-data{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin untuk menghapus data ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form{{ $data->id }}').submit();" href="{{ route('logout') }}">Ya Hapus</a>
                                    <form id="delete-form{{ $data->id }}" action="{{ route('karyawan.destroy',$data->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>