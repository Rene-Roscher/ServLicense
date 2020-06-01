@extends('layouts.app')

@section('breadcrumbs')
    Lizenzgeber - {{ $licensor->id }}
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="ownedbox">
                    <h4 class="title">Personalisierte Daten</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Name</label>
                            <input type="text" autocomplete="off"  class="form-control" id="name" name="name" placeholder="Text Input" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" autocomplete="off" class="form-control" id="email" name="email" placeholder="Emai Input">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="role">Rolle</label>
                            <select class="form-control" autocomplete="off" name="role" id="role">
                                @foreach(['ADMIN', 'CUSTOMER'] as $role)
                                    <option @if($licensor->role == $role) selected @endif>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-outline-primary">Speichern</a>
                </div>
            </div>
        </div>
    </div>
@endsection
