<?php

// show error message validate
function errorMessage($fillable)
{
  if (isset($_SESSION['errors']) && isset($_SESSION['errors'][$fillable])) {
    return  "<span class='invalid-feedback d-block'>" . $_SESSION['errors'][$fillable] . "</span>";
  }
}

// format date to d/m/Y
function formatToDMY($date)
{
  if ($date !== null) {
    return date("d/m/Y", strtotime($date));
  }
}

// format date to Y-m-d
function formatToYMD($date)
{
  $tmp = str_replace('/', '-', $date);
  return ($date) ? "'" . date("Y-m-d", strtotime($tmp)) . "'" : 'NULL';
}

function countBooking($roomId)
{
  $booking = new Booking;
  return $booking->countBookingByRoom($roomId)->num_rows;
}

