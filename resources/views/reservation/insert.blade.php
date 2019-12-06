<!DOCTYPE html>
<html>
<title>Reservation</title>

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->

<!-- Header -->

    <div class="w3-display-left w3-padding w3-col l6 m8" style="margin: 0 auto; text-align: center;">
        <div class="w3-container w3-red">
            <h2><i class="fa fa-bed w3-margin-right"></i>Hotel Name</h2>
        </div>
        <div class="w3-container w3-white w3-padding-16" style="margin: 0 auto; text-align: center;">
            <form action="{{ route('reservations.store') }}" method="POST" target="_blank" >
                @csrf
                @method('GET')
                <div class="w3-row-padding" style="margin: 0 auto;">
                    <div class="w3-half w3-margin-bottom">
                        <label for="check_in_date"><i class="fa fa-calendar-o"></i> Check In</label>
                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" id="check_in_date" name="check_in_date"required>
                    </div>
                    <div class="w3-half">
                        <label for="check_out_date"><i class="fa fa-calendar-o"></i> Check Out</label>
                        <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY" id="check_out_date" name="check_out_date" required>
                    </div>
                </div>
            <!--<div class="w3-row-padding" style="margin:auto">
                    <div class="w3-half w3-margin-bottom">
                        <label><i class="fa fa-male"></i> Adults</label>
                        <input class="w3-input w3-border" type="number" value="1" name="Adults" min="1" max="6">
                    </div>
                    <div class="w3-half">
                        <label><i class="fa fa-child"></i> Kids</label>
                        <input class="w3-input w3-border" type="number" value="0" name="Kids" min="0" max="6">
                    </div>
                </div>
                -->
                <button type="submit"><i></i>{{ __('Book now') }}</button>



            </form>
        </div>
    </div>



</body>
</html>
