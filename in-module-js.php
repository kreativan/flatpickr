
/**
     *  Load and init flatpickr
     *
     *  @param form_id string form css id
     *
     */
    public function flatpickr($form_id) {

        $module_folder = $this->config->urls->siteModules . "KappsForms/";

        // flatpickr files
        $cssFile = $module_folder . "flatpickr/flatpickr.min.css";
        $jsFile = $module_folder . "flatpickr/flatpickr.min.js";

        $this->config->styles->add($cssFile);
        $this->config->scripts->add($jsFile);
        // $this->config->scripts->add($module_folder . "forms.js");

        // flatpickr lang files
        $locale = strtolower($this->user->language->title);
        if($locale != "en") {
            $locale_file = $module_folder . "flatpickr/l10n/" . $locale . ".js";
            $this->config->scripts->add($locale_file);
        }

        $script = "
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    var dateFields = document.querySelectorAll('#{$form_id} .datePicker');
                    var timeFields = document.querySelectorAll('#{$form_id} .timePicker');

                    // set locale
                    flatpickr.localize(flatpickr.l10ns.{$locale});

                    // init date pickers
                    dateFields.forEach(e => {
                        e.flatpickr({
                            dateFormat: 'd-M-Y',
                            altInput: true,
                            altFormat: 'd-M-Y',
                            minDate: 'today',
                            // enableTime: true,
                        });
                    });

                    // init time pickers
                    timeFields.forEach(e => {
                        e.flatpickr({
                            enableTime: true,
                            noCalendar: true,
                            dateFormat: 'H:i',
                            time_24hr: true
                        });
                    });

                });
            </script>
        ";

        return $script;

    }
