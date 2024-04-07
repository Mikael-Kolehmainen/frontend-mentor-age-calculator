<?php

namespace public_site\controller;

class HomeController
{
  public function showHomePage(): void
  {
    echo "
      <section>
        <article>
          <form>
            <div class='age-input' id='day-input'>
              <label>DAY</label>
              <input type='number' placeholder='DD'></type>
              <label class='error-label'></label>
            </div>
            <div class='age-input' id='month-input'>
              <label>MONTH</label>
              <input type='number' placeholder='MM'></type>
              <label class='error-label'></label>
            </div>
            <div class='age-input' id='year-input'>
              <label>YEAR</label>
              <input type='number' placeholder='YYYY'></type>
              <label class='error-label'></label>
            </div>
          </form>
          <div class='submit'>
            <div class='style-line'></div>
            <div class='submit-btn' id='calculate-age'>
              <i class='arrow'></i>
            </div>
          </div>
          <div class='age-result'>
            <div class='result'>
              <p id='year' class='highlight'>--</p>
              <p>years</p>
            </div>
            <div class='result'>
              <p id='month' class='highlight'>--</p>
              <p>months</p>
            </div>
            <div class='result'>
              <p id='day' class='highlight'>--</p>
              <p>days</p>
            </div>
          </div>
        </article>
      </section>
    ";
  }
}
