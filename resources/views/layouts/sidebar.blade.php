<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<div class="clearfix">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<form class="search-form" role="form" action="index.html" method="get">
						<div class="input-icon right">
							<i class="icon-magnifier"></i>
							<input type="text" class="form-control" name="query" placeholder="Search...">
						</div>
					</form>
				</li>
				<li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }} ">
					<a href="{{ route('dashboard') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					{{-- <span class="selected"></span> --}}
					</a>
				</li>
                <li class="{{ (request()->segment(1) == 'bahan-baku') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-puzzle"></i>
                    <span class="title">Bahan Baku</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'bahan-baku') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class= "{{ (request()->segment(2) == 'material') ? 'active' : '' }}">
                            <a href="{{ route('material.index') }}">
                            Material</a>
                        </li>
                       <li class= "{{ (request()->segment(2) == 'model-produk') ? 'active' : '' }}">
                            <a href="{{ route('model-produk.index') }}">
                            Model Gitar</a>
                        </li>
                       <li class= "{{ (request()->segment(2) == 'produk-gitar') ? 'active' : '' }}">
                            <a href="{{ route('produk-gitar.index') }}">
                            Produk Gitar</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'order') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Order</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'order') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (request()->segment(2) == 'customer') ? 'active' : '' }}">
                            <a href="{{ route('customer.index') }}">
                            Customer</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'transaksi-order') ? 'active' : '' }}">
                            <a href="{{ route('transaksi-order.index') }}">
                            Transaksi Order</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'produksi') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Produksi</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'produksi') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                         <li class="{{ (request()->segment(2) == 'bill-of-material') ? 'active' : '' }}">
                            <a href="{{ route('bill-of-material.index') }}">
                            Bill Of Material</a>
                        </li>
                         <li class="{{ (request()->segment(2) == 'surat-perintah-kerja') ? 'active' : '' }}">
                            <a href="{{ route('surat-perintah-kerja.index') }}">
                            Surat Perintah Kerja</a>
                        </li>
                         {{-- <li class="{{ (request()->segment(2) == 'peng-bahan-baku') ? 'active' : '' }}">
                            <a href="{{ route('peng-bahan-baku.index') }}">
                            Penggunaan Bahan Baku</a>
                        </li>
                         <li class="{{ (request()->segment(2) == 'realisasi-progres') ? 'active' : '' }}">
                            <a href="{{ route('realisasi-progres.index') }}">
                            Realisasi Progres</a>
                        </li> --}}
                    </ul>
                </li>
                {{-- <li class="{{ (request()->segment(1) == 'pengiriman') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Pengiriman</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'pengiriman') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                         <li class="{{ (request()->segment(2) == 'jasaekspedisi') ? 'active' : '' }}">
                            <a href="{{ route('jasaekspedisi.index') }}">
                            Jasa Ekspedisi</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'daftar-pengiriman') ? 'active' : '' }}">
                           <a href="{{ route('daftar-pengiriman.index') }}">
                           Pengiriman</a>
                       </li>
                    </ul>
                </li> --}}
			</ul>
			<!-- END SIDEBAR MENU -->
