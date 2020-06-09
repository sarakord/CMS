<!--==========================
          Portfolio Section
        ============================-->
<section id="portfolio" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3 class="section-title">نمونه کارها</h3>
        </header>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">همه</li>
                    @foreach($tags as $tag)
                        <li data-filter=".filter-{{$tag->tag}}">{{$tag->tag}}</li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{$portfolio->tag}}">
                    <div class="portfolio-wrap">
                        <img src="{{$portfolio->image}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><a href="{{$portfolio->link}}">{{$portfolio->name}}</a></h4>
                            <p>{{$portfolio->description}}</p>
                            <div>
                                <a href="{{$portfolio->link}}" data-lightbox="portfolio" data-title="App 1"
                                   class="link-preview"
                                   title="Preview"><i class="ion ion-eye"></i></a>
                                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section><!-- #portfolio -->
