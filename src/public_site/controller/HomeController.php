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
            <div class='age-input'>
              <label>DAY</label>
              <input type='number' placeholder='DD'></type>
            </div>
            <div class='age-input'>
              <label>MONTH</label>
              <input type='number' placeholder='MM'></type>
            </div>
            <div class='age-input'>
              <label>YEAR</label>
              <input type='number' placeholder='YYYY'></type>
            </div>
          </form>
          <div class='style-line'></div>
          <a class='submit-btn'>
            <i class='arrow' />
          </a>
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
