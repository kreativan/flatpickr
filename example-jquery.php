<?php
/**
 *  Flatpickr
 * 
 *  @author Ivan Milincic <kreativan@outlook.com>
 *  @copyright 2018 Ivan Milincic
 *
 *
*/

// get current user language 
$locale = strtolower($user->language->title);
// get flatpickr language file
$locale_file = $config->paths->templates . "lib/flatpickr/l10n/" . $locale . ".js";

// load js and css - (this is my custom function to load assets)
loadFile("css", "flatpickr", "flatpickr.min");
loadFile("js", "flatpickr", "flatpickr.min");
// laod language file
if(file_exists($locale_file)) {
    loadFile("js", "flatpickr/l10n", "$locale");
}


?>

<script>
$(document).ready(function() {

    // set locale
    flatpickr.localize(flatpickr.l10ns.<?= $locale ?>);

    // init date picker
    $(".datePicker").flatpickr({
        dateFormat: "d-M-Y",
        altInput: true,
        altFormat: "d M Y",
    });

});
</script>


<form action="./" method="GET">
    <input class="datePicker uk-input" type="text" name="start" placeholder="Check In" />
</form>
