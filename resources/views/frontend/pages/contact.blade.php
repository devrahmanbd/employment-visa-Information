@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            .table-modern {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                border: 1px solid #e0e0e0;
                margin-bottom: 20px;
            }

            .table-modern thead th {
                background-color: #f9f9f9;
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: center;
            }

            .table-modern tbody td {
                border: 1px solid #e0e0e0;
                padding: 10px;
            }
        </style>
    @endpush
    <div class="">
        <div class="py-3">
            <h3 class="text-center">Ministries and Government Bodies</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ministry of Finance</td>
                    <td>+880123456789</td>
                    <td>+880987654321</td>
                    <td><a href="mailto:finance@gov.bd" class="text-decoration-none">finance@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Education</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:education@gov.bd" class="text-decoration-none">education@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Health</td>
                    <td>+880123987654</td>
                    <td>+880876543219</td>
                    <td><a href="mailto:health@gov.bd" class="text-decoration-none">health@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Agriculture</td>
                    <td>+8809988776655</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:agriculture@gov.bd" class="text-decoration-none">agriculture@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Home Affairs</td>
                    <td>+8804455667788</td>
                    <td>+8808877665544</td>
                    <td><a href="mailto:home@gov.bd" class="text-decoration-none">home@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Commerce</td>
                    <td>+8803322114455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:commerce@gov.bd" class="text-decoration-none">commerce@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Information</td>
                    <td>+8801122556688</td>
                    <td>+8804455667788</td>
                    <td><a href="mailto:info@gov.bd" class="text-decoration-none">info@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Energy</td>
                    <td>+8805544882266</td>
                    <td>+8806655443322</td>
                    <td><a href="mailto:energy@gov.bd" class="text-decoration-none">energy@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Transport</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:transport@gov.bd" class="text-decoration-none">transport@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Tourism</td>
                    <td>+8802233445566</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:tourism@gov.bd" class="text-decoration-none">tourism@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Defense</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:defense@gov.bd" class="text-decoration-none">defense@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Justice</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:justice@gov.bd" class="text-decoration-none">justice@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Science</td>
                    <td>+8809988776655</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:science@gov.bd" class="text-decoration-none">science@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Culture</td>
                    <td>+8804455667788</td>
                    <td>+8808877665544</td>
                    <td><a href="mailto:culture@gov.bd" class="text-decoration-none">culture@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Environment</td>
                    <td>+8803322114455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:environment@gov.bd" class="text-decoration-none">environment@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Youth</td>
                    <td>+8801122556688</td>
                    <td>+8804455667788</td>
                    <td><a href="mailto:youth@gov.bd" class="text-decoration-none">youth@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Women Affairs</td>
                    <td>+8805544882266</td>
                    <td>+8806655443322</td>
                    <td><a href="mailto:women@gov.bd" class="text-decoration-none">women@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Labor</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:labor@gov.bd" class="text-decoration-none">labor@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Social Welfare</td>
                    <td>+8802233445566</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:welfare@gov.bd" class="text-decoration-none">welfare@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Communication</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:communication@gov.bd" class="text-decoration-none">communication@gov.bd</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="">
        <div class="py-3">
            <h3 class="text-center">State Organization and Authorities</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ministry of Finance</td>
                    <td>+880123456789</td>
                    <td>+880987654321</td>
                    <td><a href="mailto:finance@gov.bd" class="text-decoration-none">finance@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Education</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:education@gov.bd" class="text-decoration-none">education@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Health</td>
                    <td>+880123987654</td>
                    <td>+880876543219</td>
                    <td><a href="mailto:health@gov.bd" class="text-decoration-none">health@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Agriculture</td>
                    <td>+8809988776655</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:agriculture@gov.bd" class="text-decoration-none">agriculture@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Home Affairs</td>
                    <td>+8804455667788</td>
                    <td>+8808877665544</td>
                    <td><a href="mailto:home@gov.bd" class="text-decoration-none">home@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Commerce</td>
                    <td>+8803322114455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:commerce@gov.bd" class="text-decoration-none">commerce@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Information</td>
                    <td>+8801122556688</td>
                    <td>+8804455667788</td>
                    <td><a href="mailto:info@gov.bd" class="text-decoration-none">info@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Energy</td>
                    <td>+8805544882266</td>
                    <td>+8806655443322</td>
                    <td><a href="mailto:energy@gov.bd" class="text-decoration-none">energy@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Transport</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:transport@gov.bd" class="text-decoration-none">transport@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Tourism</td>
                    <td>+8802233445566</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:tourism@gov.bd" class="text-decoration-none">tourism@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Defense</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:defense@gov.bd" class="text-decoration-none">defense@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Justice</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:justice@gov.bd" class="text-decoration-none">justice@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Science</td>
                    <td>+8809988776655</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:science@gov.bd" class="text-decoration-none">science@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Culture</td>
                    <td>+8804455667788</td>
                    <td>+8808877665544</td>
                    <td><a href="mailto:culture@gov.bd" class="text-decoration-none">culture@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Environment</td>
                    <td>+8803322114455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:environment@gov.bd" class="text-decoration-none">environment@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Youth</td>
                    <td>+8801122556688</td>
                    <td>+8804455667788</td>
                    <td><a href="mailto:youth@gov.bd" class="text-decoration-none">youth@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Women Affairs</td>
                    <td>+8805544882266</td>
                    <td>+8806655443322</td>
                    <td><a href="mailto:women@gov.bd" class="text-decoration-none">women@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Labor</td>
                    <td>+8806677889900</td>
                    <td>+8809900887766</td>
                    <td><a href="mailto:labor@gov.bd" class="text-decoration-none">labor@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Social Welfare</td>
                    <td>+8802233445566</td>
                    <td>+8805566778899</td>
                    <td><a href="mailto:welfare@gov.bd" class="text-decoration-none">welfare@gov.bd</a></td>
                </tr>
                <tr>
                    <td>Ministry of Communication</td>
                    <td>+8801122334455</td>
                    <td>+8805544332211</td>
                    <td><a href="mailto:communication@gov.bd" class="text-decoration-none">communication@gov.bd</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
