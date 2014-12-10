// ISO country code to country name conversion code
// taken and modified from https://gist.github.com/maephisto/9228207

var CHARTS = {
  config: {
    topDonorGroupSize: 8
  },
  colors: ['#2F5899', '#A5509C', '#19B7E4', '#FAAC3F' , '#61C3B0', '#FCDD3F', '#F48032', '#7C3B79', '#EB5543', '#89C764', '#1D6FB7', '#F06DA6'],
  isoCountries: {
    'AF' : 'Afghanistan',
    'AX' : 'Aland Islands',
    'AL' : 'Albania',
    'DZ' : 'Algeria',
    'AS' : 'American Samoa',
    'AD' : 'Andorra',
    'AO' : 'Angola',
    'AI' : 'Anguilla',
    'AQ' : 'Antarctica',
    'AG' : 'Antigua And Barbuda',
    'AR' : 'Argentina',
    'AM' : 'Armenia',
    'AW' : 'Aruba',
    'AU' : 'Australia',
    'AT' : 'Austria',
    'AZ' : 'Azerbaijan',
    'BS' : 'Bahamas',
    'BH' : 'Bahrain',
    'BD' : 'Bangladesh',
    'BB' : 'Barbados',
    'BY' : 'Belarus',
    'BE' : 'Belgium',
    'BZ' : 'Belize',
    'BJ' : 'Benin',
    'BM' : 'Bermuda',
    'BT' : 'Bhutan',
    'BO' : 'Bolivia',
    'BA' : 'Bosnia And Herzegovina',
    'BW' : 'Botswana',
    'BV' : 'Bouvet Island',
    'BR' : 'Brazil',
    'IO' : 'British Indian Ocean Territory',
    'BN' : 'Brunei Darussalam',
    'BG' : 'Bulgaria',
    'BF' : 'Burkina Faso',
    'BI' : 'Burundi',
    'KH' : 'Cambodia',
    'CM' : 'Cameroon',
    'CA' : 'Canada',
    'CV' : 'Cape Verde',
    'KY' : 'Cayman Islands',
    'CF' : 'Central African Republic',
    'TD' : 'Chad',
    'CL' : 'Chile',
    'CN' : 'China',
    'CX' : 'Christmas Island',
    'CC' : 'Cocos (Keeling) Islands',
    'CO' : 'Colombia',
    'KM' : 'Comoros',
    'CG' : 'Congo',
    'CD' : 'Congo, Democratic Republic',
    'CK' : 'Cook Islands',
    'CR' : 'Costa Rica',
    'CI' : 'Cote D\'Ivoire',
    'HR' : 'Croatia',
    'CU' : 'Cuba',
    'CY' : 'Cyprus',
    'CZ' : 'Czech Republic',
    'DK' : 'Denmark',
    'DJ' : 'Djibouti',
    'DM' : 'Dominica',
    'DO' : 'Dominican Republic',
    'EC' : 'Ecuador',
    'EG' : 'Egypt',
    'SV' : 'El Salvador',
    'GQ' : 'Equatorial Guinea',
    'ER' : 'Eritrea',
    'EE' : 'Estonia',
    'ET' : 'Ethiopia',
    'FK' : 'Falkland Islands (Malvinas)',
    'FO' : 'Faroe Islands',
    'FJ' : 'Fiji',
    'FI' : 'Finland',
    'FR' : 'France',
    'GF' : 'French Guiana',
    'PF' : 'French Polynesia',
    'TF' : 'French Southern Territories',
    'GA' : 'Gabon',
    'GM' : 'Gambia',
    'GE' : 'Georgia',
    'DE' : 'Germany',
    'GH' : 'Ghana',
    'GI' : 'Gibraltar',
    'GR' : 'Greece',
    'GL' : 'Greenland',
    'GD' : 'Grenada',
    'GP' : 'Guadeloupe',
    'GU' : 'Guam',
    'GT' : 'Guatemala',
    'GG' : 'Guernsey',
    'GN' : 'Guinea',
    'GW' : 'Guinea-Bissau',
    'GY' : 'Guyana',
    'HT' : 'Haiti',
    'HM' : 'Heard Island & Mcdonald Islands',
    'VA' : 'Holy See (Vatican City State)',
    'HN' : 'Honduras',
    'HK' : 'Hong Kong',
    'HU' : 'Hungary',
    'IS' : 'Iceland',
    'IN' : 'India',
    'ID' : 'Indonesia',
    'IR' : 'Iran, Islamic Republic Of',
    'IQ' : 'Iraq',
    'IE' : 'Ireland',
    'IM' : 'Isle Of Man',
    'IL' : 'Israel',
    'IT' : 'Italy',
    'JM' : 'Jamaica',
    'JP' : 'Japan',
    'JE' : 'Jersey',
    'JO' : 'Jordan',
    'KZ' : 'Kazakhstan',
    'KE' : 'Kenya',
    'KI' : 'Kiribati',
    'KR' : 'Korea',
    'KW' : 'Kuwait',
    'KG' : 'Kyrgyzstan',
    'LA' : 'Lao People\'s Democratic Republic',
    'LV' : 'Latvia',
    'LB' : 'Lebanon',
    'LS' : 'Lesotho',
    'LR' : 'Liberia',
    'LY' : 'Libyan Arab Jamahiriya',
    'LI' : 'Liechtenstein',
    'LT' : 'Lithuania',
    'LU' : 'Luxembourg',
    'MO' : 'Macao',
    'MK' : 'Macedonia',
    'MG' : 'Madagascar',
    'MW' : 'Malawi',
    'MY' : 'Malaysia',
    'MV' : 'Maldives',
    'ML' : 'Mali',
    'MT' : 'Malta',
    'MH' : 'Marshall Islands',
    'MQ' : 'Martinique',
    'MR' : 'Mauritania',
    'MU' : 'Mauritius',
    'YT' : 'Mayotte',
    'MX' : 'Mexico',
    'FM' : 'Micronesia, Federated States Of',
    'MD' : 'Moldova',
    'MC' : 'Monaco',
    'MN' : 'Mongolia',
    'ME' : 'Montenegro',
    'MS' : 'Montserrat',
    'MA' : 'Morocco',
    'MZ' : 'Mozambique',
    'MM' : 'Myanmar',
    'NA' : 'Namibia',
    'NR' : 'Nauru',
    'NP' : 'Nepal',
    'NL' : 'Netherlands',
    'AN' : 'Netherlands Antilles',
    'NC' : 'New Caledonia',
    'NZ' : 'New Zealand',
    'NI' : 'Nicaragua',
    'NE' : 'Niger',
    'NG' : 'Nigeria',
    'NU' : 'Niue',
    'NF' : 'Norfolk Island',
    'MP' : 'Northern Mariana Islands',
    'NO' : 'Norway',
    'OM' : 'Oman',
    'PK' : 'Pakistan',
    'PW' : 'Palau',
    'PS' : 'Palestinian Territory, Occupied',
    'PA' : 'Panama',
    'PG' : 'Papua New Guinea',
    'PY' : 'Paraguay',
    'PE' : 'Peru',
    'PH' : 'Philippines',
    'PN' : 'Pitcairn',
    'PL' : 'Poland',
    'PT' : 'Portugal',
    'PR' : 'Puerto Rico',
    'QA' : 'Qatar',
    'RE' : 'Reunion',
    'RO' : 'Romania',
    'RU' : 'Russian Federation',
    'RW' : 'Rwanda',
    'BL' : 'Saint Barthelemy',
    'SH' : 'Saint Helena',
    'KN' : 'Saint Kitts And Nevis',
    'LC' : 'Saint Lucia',
    'MF' : 'Saint Martin',
    'PM' : 'Saint Pierre And Miquelon',
    'VC' : 'Saint Vincent And Grenadines',
    'WS' : 'Samoa',
    'SM' : 'San Marino',
    'ST' : 'Sao Tome And Principe',
    'SA' : 'Saudi Arabia',
    'SN' : 'Senegal',
    'RS' : 'Serbia',
    'SC' : 'Seychelles',
    'SL' : 'Sierra Leone',
    'SG' : 'Singapore',
    'SK' : 'Slovakia',
    'SI' : 'Slovenia',
    'SB' : 'Solomon Islands',
    'SO' : 'Somalia',
    'ZA' : 'South Africa',
    'GS' : 'South Georgia And Sandwich Isl.',
    'ES' : 'Spain',
    'LK' : 'Sri Lanka',
    'SD' : 'Sudan',
    'SR' : 'Suriname',
    'SJ' : 'Svalbard And Jan Mayen',
    'SZ' : 'Swaziland',
    'SE' : 'Sweden',
    'CH' : 'Switzerland',
    'SY' : 'Syrian Arab Republic',
    'TW' : 'Taiwan',
    'TJ' : 'Tajikistan',
    'TZ' : 'Tanzania',
    'TH' : 'Thailand',
    'TL' : 'Timor-Leste',
    'TG' : 'Togo',
    'TK' : 'Tokelau',
    'TO' : 'Tonga',
    'TT' : 'Trinidad And Tobago',
    'TN' : 'Tunisia',
    'TR' : 'Turkey',
    'TM' : 'Turkmenistan',
    'TC' : 'Turks And Caicos Islands',
    'TV' : 'Tuvalu',
    'UG' : 'Uganda',
    'UA' : 'Ukraine',
    'AE' : 'United Arab Emirates',
    'GB' : 'United Kingdom',
    'US' : 'United States',
    'UM' : 'United States Outlying Islands',
    'UY' : 'Uruguay',
    'UZ' : 'Uzbekistan',
    'VU' : 'Vanuatu',
    'VE' : 'Venezuela',
    'VN' : 'Vietnam',
    'VG' : 'Virgin Islands, British',
    'VI' : 'Virgin Islands, U.S.',
    'WF' : 'Wallis And Futuna',
    'EH' : 'Western Sahara',
    'YE' : 'Yemen',
    'ZM' : 'Zambia',
    'ZW' : 'Zimbabwe'
  },
  addCommas: function (target) {
    target += '';

    var x = target.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

    return x1 + x2;
  },
  getCountryName: function(countryCode) {
    return this.isoCountries.hasOwnProperty(countryCode) ? this.isoCountries[countryCode] : countryCode;
  },
  init: function (target, localizedStrings, makeDataFake) {
    var self = this;

    makeDataFake = makeDataFake || false;

    // Inject basic HTML
    document.querySelector(target).innerHTML =
      '<section id="chart-country-data" class="chart">' +
        '<header>' + localizedStrings.donorsByCountry + '</header>' +
        '<svg class="chart-graphic"></svg>' +
      '</section>' +

      '<section id="chart-source-data" class="chart">' +
        '<header>' + localizedStrings.donorsBySource + '</header>' +
        '<div class="bar-chart"></div>' +
      '</section>';

    this.fetchData('https://d3gxuc3bq48qfa.cloudfront.net/eoy-2014-bycountry', function (data) {
      data = this.modelData(data, {
        category: 'country_code',
        donor: 'count'
      }, makeDataFake);
      this.renderPieChart('#chart-country-data', data);

      if (data.length > self.config.topDonorGroupSize) {
        this.renderShowHide(document.querySelector('#chart-country-data [data-component="toggle"]'));
      }
    });

    this.fetchData('https://transformtogeckoboard.herokuapp.com/eoy/transactionsbysource', function (data) {
      data = this.modelData(data, {
        category: 'source',
        donor: 'eoyDonations'
      }, makeDataFake);
      this.renderBarChart('#chart-source-data', data);

      if (data.length > self.config.topDonorGroupSize) {
        this.renderShowHide(document.querySelector('#chart-source-data [data-component="toggle"]'));
      }
    });
  },
  modelData: function (data, dataKeys, makeDataFake) {
    var self = this;
    var modeledData = [];
    var categoryKey = dataKeys.category;
    var donorKey = dataKeys.donor;

    data.forEach(function (item, index, array) {
      if (parseInt(item.eoyDonations, 10) !== 0 || makeDataFake) {
        modeledData.push({
          donationSource: (categoryKey === "country_code") ? self.getCountryName(item[categoryKey]) : item[categoryKey] ,
          eoyDonations: makeDataFake ? Math.round(Math.random() * 1000000) : item[donorKey]
        });
      }
    });

    // Sort data by number of donors (highest to lowest)
    modeledData = modeledData.sort(function (a, b) {
      return b.eoyDonations - a.eoyDonations;
    });

    // Simulating a large top source (for fake data only)
    if (makeDataFake) {
      modeledData[0].eoyDonations = Math.round(modeledData[0].eoyDonations * (Math.random() * 3 + 1));
    }

    return modeledData;
  },
  fetchData: function (url, callback) {
    var request = new XMLHttpRequest();
    var self = this;

    request.open('GET', url, true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400){
        var data = JSON.parse(this.response);
        callback.call(self, data);
      } else {
        console.error('Data request failed');
      }
    };

    request.onerror = function() {
      console.error('Data request failed');
    };

    request.send();
  },
  renderBarChart: function (target, data) {
    var self = this,
      width = 340,
      barHeight = 27,
      chartHTML = '',
      largestValue = data[0].eoyDonations;

    function buildKeyItem(item, index) {
      var fragment = '';

      if (item.eoyDonations !== '0') {
        fragment += '<div class="bar" style="width:' + ((item.eoyDonations / largestValue)*100).toString() + '%; background-color: ' + self.colors[index % 12] + '; height:' + barHeight + 'px"></div>';
        fragment += '<p class="bar-meta">' + item.donationSource + ' <span>' + self.addCommas(item.eoyDonations) + '</span></p>';
      }

      return fragment;
    }

    // Construct Key ----------------------------------------------------------

    // Construct top donors section
    chartHTML += '<div>';

    data.slice(0, self.config.topDonorGroupSize).forEach(function (item, index, array) {
      chartHTML += buildKeyItem(item, index);
    });

    chartHTML += '</div>';

    // Construct bottom donors section
    chartHTML += '<div data-component="toggle">';

    data.slice(self.config.topDonorGroupSize).forEach(function (item, index, array) {
      chartHTML += buildKeyItem(item, index);
    });

    chartHTML += '</div>';

    document.querySelector(target + ' .bar-chart').innerHTML = chartHTML;
  },
  renderPieChart: function (target, data) {
    var viewbox = '0 0 340 340',
      radius = 170,
      elTarget = document.querySelector(target),
      self = this;

    var chart = d3.select(target + ' svg')
      .data([data.slice(0, self.config.topDonorGroupSize)])
      .attr('viewbox', viewbox)
      .append('svg:g')
      .attr('transform', 'translate(' + radius + ',' + radius + ')');

    var arc = d3.svg.arc()
      .outerRadius(radius);

    var pie = d3.layout.pie()
      .value(function(d) { return parseFloat(d.eoyDonations, 10); });

    var arcs = chart.selectAll('g.slice')
      .data(pie)
      .enter()
      .append('svg:g')
      .attr('class', 'slice');

    function buildKeyItem(item, index, isOnChart) {
      var fragment = '';

      // Don't build keys for non-donors
      if (item.eoyDonations !== '0') {
        fragment += '<p>';

        if (isOnChart) {
          fragment += '<b style="color:' + self.colors[index] + '">&#9724;</b> ';
        }

        fragment += (item.donationSource + '<br/><span>' + self.addCommas(Math.round(item.eoyDonations)) + '</span></p>');
      }

      return fragment;
    }

    arcs.append('svg:path')
      .attr('fill', function(d, i) { return self.colors[i]; } )
      .attr('d', arc);

    // Construct Key ----------------------------------------------------------

    // Construct top donors section
    var keyHTML = '<div class="pie-chart-key"><div class="group">';

    data.slice(0, self.config.topDonorGroupSize).forEach(function (item, index, array) {
      keyHTML += buildKeyItem(item, index, true);
    });

    keyHTML += '</div>';

    // Construct bottom donors section
    keyHTML += '<div class="group" data-component="toggle">';

    data.slice(self.config.topDonorGroupSize).forEach(function (item, index, array) {
      keyHTML += buildKeyItem(item, index, false);
    });

    keyHTML += '</div></div>';

    elTarget.innerHTML = elTarget.innerHTML + keyHTML;
  },
  renderShowHide: function (target) {
    var isVisible = false,
      elToggle = document.createElement('button'),
      nativeDisplay = target.style.display;

    elToggle.innerHTML = '+';
    elToggle.classList.add('btn-toggle');

    target.parentNode.insertBefore(elToggle , target);
    target.style.display = 'none';

    elToggle.addEventListener('click', function () {
      if (isVisible) {
        target.style.display = 'none';
        elToggle.innerHTML = '+';
      } else {
        target.style.display = nativeDisplay;
        elToggle.innerHTML = '-';
      }

      isVisible = !isVisible;
    });
  }
};
