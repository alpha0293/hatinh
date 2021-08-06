{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    <section data-background="{{ Theme::asset()->url('images/vanhanh.jpg') }}" class="section page-intro pt-100 pb-100 bg-cover">
        <div style="opacity: 0.7" class="bg-overlay"></div>
        <div class="container">
            <h3 class="page-intro__title">{{ Theme::get('section-name') }}</h3>
            {!! Theme::breadcrumb()->render() !!}
        </div>
    </section>
@endif
<section class="section pt-50 pb-100">
    <div class="container">
        <div class="row">
            <section class="col-xs-12 col-sm-9 col-lg-9">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>
            </section>
            <section class="col-xs-12 col-sm-3 col-lg-3 ">
                <div class="page-sidebar">
                    {!! Theme::partial('sidebar') !!}
                </div>
            </section>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}


