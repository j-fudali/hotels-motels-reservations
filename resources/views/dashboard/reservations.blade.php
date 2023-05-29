@extends('shared.dashboard')
@section('sidebar')
    @include('shared.search-bar')
@endsection
@section('dashboard-content')
    <h3>Rezerwacje</h3>
    <div class="container-fluid p-0 d-flex flex-column gap-2">
        <div class="bg-white m-0 p-3 row gap-2 align-items-between">
            <img class="img-fluid col-12 col-md-6 col-lg-5" src="{{ url('images/hero-unit.jpg') }}" alt="">
            <div class="col d-flex flex-column justify-content-between align-items-start">
                <h5>Nazwa hotelu</h5>
                <p>
                    {{ \Illuminate\Support\Str::limit(
                        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere dolorem quibusdam quos necessitatibus nesciunt fugit tenetur molestias aperiam itaque voluptatum. In officiis consequuntur et nesciunt facere dignissimos, quo nam, illum incidunt pariatur dolores dolorum, aperiam earum voluptatem cum sapiente. Excepturi libero nisi odio esse quas quos recusandae voluptate repellendus nulla facilis, eaque consectetur laborum ad aliquid aliquam animi quis sit quia doloremque tempore, exercitationem blanditiis ea eligendi? Labore nisi quibusdam reiciendis alias assumenda pariatur cum enim, omnis fugiat incidunt dolores ex voluptas exercitationem, voluptatem molestiae magnam aperiam blanditiis, veniam quisquam praesentium minus quidem. Quasi ab eaque, eos non sunt quas minus, maiores ipsam rerum, sapiente error inventore fugit possimus accusantium repudiandae deserunt consequuntur illum minima aperiam ratione iure. Aliquam, ad atque illum eius debitis nisi hic dolore porro molestiae quam voluptatibus ratione tenetur repellat fuga labore nobis exercitationem sit similique quae. Temporibus facere repudiandae culpa doloribus ducimus, dignissimos perspiciatis obcaecati eligendi explicabo. Libero a facere vero in et? Ratione, natus.',
                        250,
                        $end = '...',
                    ) }}
                </p>
                <a href="#" class="btn btn-outline-primary">Więcej</a>
            </div>
            <a href="#" class="col-auto btn btn-danger align-self-end">Anuluj</a>
        </div>
        <div class="bg-white m-0 p-3 row gap-2 align-items-between">
            <img class="img-thumbnail object-fit-contain col-12 col-md-6 col-lg-5" src="{{ url('images/hero-unit.jpg') }}"
                alt="">
            <div class="col d-flex flex-column justify-content-between align-items-start">
                <h5>Nazwa hotelu</h5>
                <p>
                    {{ \Illuminate\Support\Str::limit(
                        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere dolorem quibusdam quos necessitatibus nesciunt fugit tenetur molestias aperiam itaque voluptatum. In officiis consequuntur et nesciunt facere dignissimos, quo nam, illum incidunt pariatur dolores dolorum, aperiam earum voluptatem cum sapiente. Excepturi libero nisi odio esse quas quos recusandae voluptate repellendus nulla facilis, eaque consectetur laborum ad aliquid aliquam animi quis sit quia doloremque tempore, exercitationem blanditiis ea eligendi? Labore nisi quibusdam reiciendis alias assumenda pariatur cum enim, omnis fugiat incidunt dolores ex voluptas exercitationem, voluptatem molestiae magnam aperiam blanditiis, veniam quisquam praesentium minus quidem. Quasi ab eaque, eos non sunt quas minus, maiores ipsam rerum, sapiente error inventore fugit possimus accusantium repudiandae deserunt consequuntur illum minima aperiam ratione iure. Aliquam, ad atque illum eius debitis nisi hic dolore porro molestiae quam voluptatibus ratione tenetur repellat fuga labore nobis exercitationem sit similique quae. Temporibus facere repudiandae culpa doloribus ducimus, dignissimos perspiciatis obcaecati eligendi explicabo. Libero a facere vero in et? Ratione, natus.',
                        250,
                        $end = '...',
                    ) }}
                </p>
                <a href="#" class="btn btn-outline-primary">Więcej</a>
            </div>
            <a href="#" class="col-auto btn btn-danger align-self-end">Anuluj</a>
        </div>
        <div class="bg-white m-0 p-3 row gap-2 align-items-between">
            <img class="img-thumbnail object-fit-contain col-12 col-md-6 col-lg-5" src="{{ url('images/hero-unit.jpg') }}"
                alt="">
            <div class="col d-flex flex-column justify-content-between align-items-start">
                <h5>Nazwa hotelu</h5>
                <p>
                    {{ \Illuminate\Support\Str::limit(
                        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere dolorem quibusdam quos necessitatibus nesciunt fugit tenetur molestias aperiam itaque voluptatum. In officiis consequuntur et nesciunt facere dignissimos, quo nam, illum incidunt pariatur dolores dolorum, aperiam earum voluptatem cum sapiente. Excepturi libero nisi odio esse quas quos recusandae voluptate repellendus nulla facilis, eaque consectetur laborum ad aliquid aliquam animi quis sit quia doloremque tempore, exercitationem blanditiis ea eligendi? Labore nisi quibusdam reiciendis alias assumenda pariatur cum enim, omnis fugiat incidunt dolores ex voluptas exercitationem, voluptatem molestiae magnam aperiam blanditiis, veniam quisquam praesentium minus quidem. Quasi ab eaque, eos non sunt quas minus, maiores ipsam rerum, sapiente error inventore fugit possimus accusantium repudiandae deserunt consequuntur illum minima aperiam ratione iure. Aliquam, ad atque illum eius debitis nisi hic dolore porro molestiae quam voluptatibus ratione tenetur repellat fuga labore nobis exercitationem sit similique quae. Temporibus facere repudiandae culpa doloribus ducimus, dignissimos perspiciatis obcaecati eligendi explicabo. Libero a facere vero in et? Ratione, natus.',
                        250,
                        $end = '...',
                    ) }}
                </p>
                <a href="#" class="btn btn-outline-primary">Więcej</a>
            </div>
            <a href="#" class="col-auto btn btn-danger align-self-end">Anuluj</a>
        </div>
        <div class="bg-white m-0 p-3 row gap-2 align-items-between">
            <img class="img-thumbnail object-fit-contain col-12 col-md-6 col-lg-5" src="{{ url('images/hero-unit.jpg') }}"
                alt="">
            <div class="col d-flex flex-column justify-content-between align-items-start">
                <h5>Nazwa hotelu</h5>
                <p>
                    {{ \Illuminate\Support\Str::limit(
                        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere dolorem quibusdam quos necessitatibus nesciunt fugit tenetur molestias aperiam itaque voluptatum. In officiis consequuntur et nesciunt facere dignissimos, quo nam, illum incidunt pariatur dolores dolorum, aperiam earum voluptatem cum sapiente. Excepturi libero nisi odio esse quas quos recusandae voluptate repellendus nulla facilis, eaque consectetur laborum ad aliquid aliquam animi quis sit quia doloremque tempore, exercitationem blanditiis ea eligendi? Labore nisi quibusdam reiciendis alias assumenda pariatur cum enim, omnis fugiat incidunt dolores ex voluptas exercitationem, voluptatem molestiae magnam aperiam blanditiis, veniam quisquam praesentium minus quidem. Quasi ab eaque, eos non sunt quas minus, maiores ipsam rerum, sapiente error inventore fugit possimus accusantium repudiandae deserunt consequuntur illum minima aperiam ratione iure. Aliquam, ad atque illum eius debitis nisi hic dolore porro molestiae quam voluptatibus ratione tenetur repellat fuga labore nobis exercitationem sit similique quae. Temporibus facere repudiandae culpa doloribus ducimus, dignissimos perspiciatis obcaecati eligendi explicabo. Libero a facere vero in et? Ratione, natus.',
                        250,
                        $end = '...',
                    ) }}
                </p>
                <a href="#" class="btn btn-outline-primary">Więcej</a>
            </div>
            <a href="#" class="col-auto btn btn-danger align-self-end">Anuluj</a>
        </div>
    </div>
@endsection
