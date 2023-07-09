<x-app-layout>
    @section('title',"$metaDetails->meta_title")
    @section('metadesc',"$metaDetails->meta_description")
    @section('metakeyword',"$metaDetails->meta_keywords")

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block container mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    {{ Breadcrumbs::render('download') }}
    <main id="main">
        <!-- <hr style="margin: 2% 10%;background: #b5b5b5;" /> -->
        <!-- ======= Download Section ======= -->
        <section id="download" class="download">
            <div class="container">
                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class=" primary-text header-font-size" style="padding-bottom: 3%;">Download Our product Catalogue</h2>
                </div>
                <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if ($downloadData->count() > 0)
                    @foreach($downloadData as $key => $field)
                    @php echo $field->description @endphp
                    @endforeach
                    @endif
                </div>
            </div>
        </section><!-- End Download Section -->
    </main><!-- End #main -->
</x-app-layout>