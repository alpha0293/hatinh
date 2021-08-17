@if ($supportedLocales && count($supportedLocales) > 1)
    @php
        $languageDisplay = setting('language_display', 'all');
        $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
    @endphp
    
         
                @foreach ($supportedLocales as $localeCode => $properties)
             
                        <a @if ($localeCode == Language::getCurrentLocale()) class="active" @endif rel="alternate" hreflang="{{ $localeCode }}" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                            @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                        </a>
            
                @endforeach
       

        {!! Arr::get($options, 'after') !!}
    @else
        
            @foreach ($supportedLocales as $localeCode => $properties)
               
                    <a @if ($localeCode == Language::getCurrentLocale()) class="active" @endif rel="alternate" hreflang="{{ $localeCode }}" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                        @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                       
                    </a>
           
            @endforeach
    
   
@endif
