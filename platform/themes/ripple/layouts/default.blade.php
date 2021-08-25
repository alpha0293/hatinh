{!! Theme::partial('header') !!}
@if (Theme::get('section-name'))
    <section class="section-breadcrumb section page-intro pt-20">
        <div class="container-fluid">
            <h3 class="page-intro__title">{{ Theme::get('section-name') }}</h3>
            {!! Theme::breadcrumb()->render() !!}
        </div>
    </section>
@endif
<section class="section pt-50 pb-100">
    <div class="container-fluid">
        <div class="row">
            <section class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="page-content">
                    {!! Theme::content() !!}
                </div>
            </section>
            <section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                <div class="page-sidebar">
                    {!! Theme::partial('sidebar') !!}
                </div>
            </section>
        </div>
    </div>
</section>
{!! Theme::partial('footer') !!}


