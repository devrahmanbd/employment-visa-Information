@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            h1 {
                font-size: 24px;
                margin-bottom: 15px;
                color: #000;
            }

            p {
                margin-bottom: 15px;
            }

            a {
                color: #0066cc;
                text-decoration: none;
            }

            .service-list {
                display: flex;
                flex-wrap: wrap;
                margin: 20px 0;
            }

            .service-item {
                width: 50%;
                padding: 5px 0;
                display: flex;
                align-items: flex-start;
            }

            .service-item svg {
                min-width: 16px;
                height: 16px;
                margin-right: 10px;
                margin-top: 3px;
            }

            .circle-icon {
                fill: #777;
            }

            .approval-section {
                margin-top: 30px;
            }

            .approval-section h2 {
                font-size: 20px;
                margin-bottom: 15px;
            }

            .approval-item {
                display: flex;
                align-items: flex-start;
                margin-bottom: 15px;
            }

            .approval-icon {
                min-width: 24px;
                height: 24px;
                margin-right: 10px;
            }

            .blue-text {
                color: #0066cc;
            }

            .final-note {
                font-style: italic;
                margin-top: 20px;
            }

            @media (max-width: 768px) {
                .service-item {
                    width: 100%;
                }
            }

            .approval-section {
                background: #ffffff;
                border-left: 5px solid #ffcc00;
                border-radius: 10px;
                padding: 20px;
            }

            .approval-list li {
                display: flex;
                align-items: flex-start;
                padding: 10px 0;
                position: relative;
            }

            .approval-icon {
                width: 30px;
                height: 30px;
                background: #ffcc00;
                color: white;
                font-size: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                margin-right: 15px;
            }

            .approval-list p {
                font-size: 16px;
                color: #333;
                margin: 0;
            }

            h3 {
                font-size: 22px;
                font-weight: bold;
            }

            h3 span {
                font-weight: normal;
                font-size: 18px;
            }

            .timeline {
                display: flex;
                flex-direction: column;
                align-items: start;
                position: relative;
            }

            .timeline-item {
                display: flex;
                align-items: flex-start;
                position: relative;
                width: 100%;
                margin-bottom: 20px;
            }

            .timeline-icon {
                width: 30px;
                height: 30px;
                border: 4px solid #b58329;
                border-radius: 50%;
                background-color: white;
                position: absolute;
                left: 0;
                top: 5px;
            }

            .timeline-item:not(:last-child)::after {
                content: "";
                position: absolute;
                top: 40px;
                left: 14px;
                width: 4px;
                height: calc(100% - 40px);
                background-color: #b58329;
            }

            .timeline-content {
                background: #fff;
                padding: 12px 15px;
                margin-left: 50px;
                word-wrap: break-word;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .timeline {
                    padding-left: 20px;
                }

                .timeline-icon {
                    width: 25px;
                    height: 25px;
                    left: -5px;
                }

                .timeline-item:not(:last-child)::after {
                    left: 10px;
                }

                .timeline-content {
                    margin-left: 40px;
                    max-width: 100%;
                }
            }
        </style>
    @endpush
    <div class="">
        <h1>About us</h1>

        <p>The webpage of Public Authority of Manpower is authorized and fully controlled by the Ministry of Interior [<a
                href="https://www.moi.gov.kw">https://www.moi.gov.kw</a>] (MOI), State of Kuwait and Ministry of Foreign
            Affairs
            [<a href="https://www.mofa.gov.kw">https://www.mofa.gov.kw</a>] (MOFA), State of Kuwait.</p>

        <p>This "Employment Visa Information" service is provided by the Ministry of Interior [<a
                href="https://www.moi.gov.kw">https://www.moi.gov.kw</a>] (MOI), State of Kuwait and Ministry of Foreign
            Affairs
            [<a href="https://www.mofa.gov.kw">https://www.mofa.gov.kw</a>] (MOFA), State of Kuwait. And it's strictly
            controlled.</p>

        <p>This is an online service provided by the Ministry of Interior [<a
                href="https://www.moi.gov.kw">https://www.moi.gov.kw</a>] (MOI), State of Kuwait. It helps facilitating the
            procedures needed to recruit employees for business owners, and managing all the transactions online. This
            service
            allows you to:</p>

        <div class="service-list">
            <!-- Left Column -->
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Issuing work permit for the first time - Expatriate Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Renew work permit - National Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Amending work permit - National Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Issuing work permit - Expatriate Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Work permit renewal - Expatriate Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Managing business hours for each license in the file</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>File primary data</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Employee leave input - Sick/Urgent</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about Labor complaints</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Requesting & Printing Labor list</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about absence announcements</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>View completeness status and jobs details</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Amending or revoking contract and work location</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>National Labor list</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Amending need estimation</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Submitting Labor list without (RJ)</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Submitting licensed worker absence announcement</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Opening a file</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Registering - National Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Revoking work permit - Expatriate Labor</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Revoking work permit - National Labor</span>
            </div>

            <!-- Right Column -->
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about bank transfers</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about license primary data</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Upload payroll file</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Employee leave input -Regular</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about Employers entered leaves</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Estimating first time - Required Laborers</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about payroll deductions</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Updating license data</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Adding contract and work location</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Lists of contracts, locations and working hours</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Expatriate Labor list</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Renew need estimation</span>
            </div>
            <div class="service-item">
                <svg viewBox="0 0 100 100" class="circle-icon">
                    <circle cx="50" cy="50" r="40" stroke="#777" stroke-width="10" fill="none" />
                </svg>
                <span>Enquiry about transaction (Upload payroll file)</span>
            </div>
        </div>
    </div>


    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-icon"></div>
            <div class="timeline-content">
                <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development.
                    Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"></div>
            <div class="timeline-content">
                <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development. </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"></div>
            <div class="timeline-content">
                <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"></div>
            <div class="timeline-content">
                <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon"></div>
            <div class="timeline-content">
                <p>Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web
                    development.</p>
            </div>
        </div>
    </div>




    </div>
@endsection
