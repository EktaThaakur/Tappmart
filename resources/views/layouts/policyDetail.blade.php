@include('layouts.sections.header')
@include('layouts.sections.sidebar')
<div class="content-wrapper">
    <div class="container">
        <div class="policy-details">
            <h2>Policy Details</h2>
            <div class="policy-card">
                <p><strong>Product:</strong> {{ $policy->product }}</p>
                <div class="policy-content">
                    <strong>Content:</strong>
                    {!! $policy->content !!}
                </div>
            </div>
            <div class="policy-card mt-3">
                <div class="policy-FAQ">
                    <strong>FAQ:</strong>
                    {!! $policy->FAQ !!}
                </div>
            </div>
            <div class="policy-card mt-3">
                <div class="policy-about">
                    <strong>About:</strong>
                    {!! $policy->about !!}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .container {
        margin-top: 20px;
    }

    .policy-card {
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .policy-details h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .policy-content {
        margin-top: 10px;
        font-size: 16px;
    }

    /* Mobile responsiveness */
    @media (max-width: 767px) {
        .container {
            padding: 15px;
        }

        .policy-card {
            padding: 15px;
        }

        .policy-details h2 {
            font-size: 20px;
        }

        .policy-content {
            font-size: 14px;
        }
    }
</style>

@include('layouts.sections.footer')