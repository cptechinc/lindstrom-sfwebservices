<?php
	foreach ($args as $variable => $value) {
		$$variable = $value;
	}
?>

<div class="input-group input-group-sm datepicker">
	<input type="text" name="<?= $name; ?>" id="<?= $name; ?>" class="form-control text-monospace date-input" value="<?= $val; ?>" placeholder="" aria-label="<?= $label; ?>">

	<div class="input-group-append">
		<button type="button" class="btn btn-primary form_button input-group-text dropdown-toggle" data-toggle="dropdown" tabindex="-1">
			<i class="fa fa-calendar" aria-hidden="true"></i> <span class="sr-only">Toggle Calendar</span>
		</button>
		<div class="dropdown-menu dropdown-menu-right datepicker-calendar-wrapper" role="menu">
			<div class="datepicker-calendar">
				<div class="datepicker-calendar-header">
					<button type="button" class="prev bg-secondary form_button"><i class="fa fa-chevron-left text-white"></i><span class="sr-only">Previous Month</span></button>
					<button type="button" class="next bg-secondary form_button"><i class="fa fa-chevron-right text-white"></i><span class="sr-only">Next Month</span></button>
					<button type="button" class="title form_button" data-month="7" data-year="2025">
						<span class="month font-weight-bold text-dark">
							<span data-month="0">January</span> <span data-month="1">February</span> <span data-month="2">March</span>
							<span data-month="3">April</span> <span data-month="4">May</span> <span data-month="5">June</span>
							<span data-month="6">July</span> <span data-month="7" class="current">August</span> <span data-month="8">September</span>
							<span data-month="9">October</span> <span data-month="10">November</span> <span data-month="11">December</span>
						</span> <span class="year font-weight-bold text-dark">2025</span>
					</button>
				</div>
				<table class="datepicker-calendar-days">
					<thead> <tr> <th>Su</th> <th>Mo</th> <th>Tu</th> <th>We</th> <th>Th</th> <th>Fr</th> <th>Sa</th> </tr> </thead>
					<tbody><tr><td class="last-month first past" data-date="27" data-month="6" data-year="2025"><span><button type="button" class="datepicker-date">27</button></span></td><td class="last-month past" data-date="28" data-month="6" data-year="2025"><span><button type="button" class="datepicker-date">28</button></span></td><td class="last-month past" data-date="29" data-month="6" data-year="2025"><span><button type="button" class="datepicker-date">29</button></span></td><td class="last-month past" data-date="30" data-month="6" data-year="2025"><span><button type="button" class="datepicker-date">30</button></span></td><td class="last-month past last" data-date="31" data-month="6" data-year="2025"><span><button type="button" class="datepicker-date">31</button></span></td><td data-date="1" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">1</button></span></td><td data-date="2" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">2</button></span></td></tr><tr><td data-date="3" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">3</button></span></td><td data-date="4" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">4</button></span></td><td data-date="5" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">5</button></span></td><td data-date="6" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">6</button></span></td><td data-date="7" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">7</button></span></td><td data-date="8" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">8</button></span></td><td data-date="9" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">9</button></span></td></tr><tr><td data-date="10" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">10</button></span></td><td data-date="11" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">11</button></span></td><td data-date="12" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">12</button></span></td><td data-date="13" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">13</button></span></td><td data-date="14" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">14</button></span></td><td data-date="15" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">15</button></span></td><td data-date="16" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">16</button></span></td></tr><tr><td data-date="17" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">17</button></span></td><td data-date="18" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">18</button></span></td><td data-date="19" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">19</button></span></td><td data-date="20" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">20</button></span></td><td data-date="21" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">21</button></span></td><td data-date="22" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">22</button></span></td><td data-date="23" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">23</button></span></td></tr><tr><td data-date="24" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">24</button></span></td><td data-date="25" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">25</button></span></td><td data-date="26" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">26</button></span></td><td data-date="27" data-month="7" data-year="2025" class="past"><span><button type="button" class="datepicker-date">27</button></span></td><td data-date="28" data-month="7" data-year="2025" class="current-day"><span><button type="button" class="datepicker-date">28</button></span></td><td data-date="29" data-month="7" data-year="2025"><span><button type="button" class="datepicker-date">29</button></span></td><td data-date="30" data-month="7" data-year="2025"><span><button type="button" class="datepicker-date">30</button></span></td></tr><tr><td data-date="31" data-month="7" data-year="2025" class="last"><span><button type="button" class="datepicker-date">31</button></span></td><td class="next-month first" data-date="1" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">1</button></span></td><td class="next-month" data-date="2" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">2</button></span></td><td class="next-month" data-date="3" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">3</button></span></td><td class="next-month" data-date="4" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">4</button></span></td><td class="next-month" data-date="5" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">5</button></span></td><td class="next-month last" data-date="6" data-month="8" data-year="2025"><span><button type="button" class="datepicker-date">6</button></span></td></tr></tbody>
				</table>
				<div class="datepicker-calendar-footer">
					<button type="button" class="datepicker-today form_button">Today</button>
				</div>
			</div>
			<div class="datepicker-wheels" aria-hidden="true">
				<div class="datepicker-wheels-month">
					<h2 class="header text-dark">Month</h2>
					<ul>
						<li data-month="0"><button type="button" class="form_button">Jan</button></li> <li data-month="1"><button type="button" class="form_button">Feb</button></li>
						<li data-month="2"><button type="button" class="form_button">Mar</button></li> <li data-month="3"><button type="button" class="form_button">Apr</button></li>
						<li data-month="4"><button type="button" class="form_button">May</button></li> <li data-month="5"><button type="button" class="form_button">Jun</button></li>
						<li data-month="6"><button type="button" class="form_button">Jul</button></li> <li data-month="7"><button type="button" class="form_button">Aug</button></li>
						<li data-month="8"><button type="button" class="form_button">Sep</button></li> <li data-month="9"><button type="button" class="form_button">Oct</button></li>
						<li data-month="10"><button type="button" class="form_button">Nov</button></li> <li data-month="11"><button type="button" class="form_button">Dec</button></li>
					</ul>
				</div>
				<div class="datepicker-wheels-year">
					<h2 class="header text-dark">Year</h2>
					<ul></ul>
				</div>
				<div class="datepicker-wheels-footer clearfix">
					<button type="button" class="btn datepicker-wheels-back form_button"><span class="glyphicon glyphicon-arrow-left"></span><span class="sr-only">Return to Calendar</span></button>
					<button type="button" class="btn datepicker-wheels-select form_button">Select <span class="sr-only">Month and Year</span></button>
				</div>
			</div>
		</div>
	</div>
</div>