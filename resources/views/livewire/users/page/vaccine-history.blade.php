 <div>
     <div class="card-health padding">
         <div class="settings-dropdown">
             <i class='bx bx-cog settings-icon'></i>
             <div class="settings-menu">
                 <ul>
                     @foreach (config('menu') as $menu)
                         <li>
                             <a href="{{ $menu['route'] != '#' ? route($menu['route'], ['code' => Session::get('pet-code')]) : '#' }}"
                                 class="menu-option">
                                 <div class="text">{{ __($menu['label']) }}</div>
                             </a>
                         </li>
                     @endforeach
                 </ul>
             </div>
         </div>
         <label class="header" style="font-size: 20px">Vaccination History</label>
         <table>
            <thead>
              <tr>
                <th scope="col" class="text-left">Vaccine Name</th>
                <th scope="col">Pet Age</th>
                <th scope="col">Date Admin.</th>
                <th scope="col">Next Due</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" data-label="Vaccine Name" class="text-left">Visa - 3412</td>
                <td data-label="Pet Age">4 Year</td>
                <td data-label="Date Admin.">02/01/2016</td>
                <td data-label="Next Due">03/01/2016</td>
                <td data-label="Action">Action</td>
              </tr>
              <tr>
                <td scope="row" data-label="Vaccine Name" class="text-left">Visa - 6076</td>
                <td data-label="Pet Age">4 Year</td>
                <td data-label="Date Admin.">02/01/2016</td>
                <td data-label="Next Due">02/01/2016</td>
                <td data-label="Action">Action</td>
              </tr>
              <tr>
                <td scope="row" data-label="Vaccine Name" class="text-left">Corporate AMEX</td>
                <td data-label="Pet Age">4 Year</td>
                <td data-label="Date Admin.">02/01/2016</td>
                <td data-label="Next Due">02/01/2016</td>
                <td data-label="Action">Action</td>
              </tr>
            </tbody>
          </table>
     </div>
 </div>
