<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    @if(Auth::user()->role == 1)
    <li>
        <a href="{{ route('jabatan.index') }}">Data Jabatan</a>
    </li>
    <li>
        <a href="{{ route('departemen.index') }}">Data Departemen</a>
    </li>
    <li>
        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
    </li>
    <li>
        <a href="{{ route('status-cuti.index') }}">Status Cuti</a>
    </li>
    <li>
        <a href="{{ route('jenis-cuti.index') }}">Jenis Cuti</a>
    </li>
    @endif
    <li>
        <a href="{{ route('pengajuan-cuti.index') }}">Pengajuan Cuti</a>
    </li>
    <li>
        <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
