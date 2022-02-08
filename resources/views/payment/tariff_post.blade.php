
<form id="deposit" class="payment-form" action="https://perfectmoney.com/api/step1.asp" method="POST">
    <input type="hidden" name="PAYEE_ACCOUNT" value="{{ $payment->payee_account }}">
    <input type="hidden" name="PAYEE_NAME" value="{{ $payment->payee_name }}">
    <input type="hidden" name="PAYMENT_ID" value="{{ $payment->payment_id }}">
    <input class="amount" type="hidden" name="PAYMENT_AMOUNT" value="{{ $amount }}"><BR>
    <input type="hidden" name="PAYMENT_UNITS" value="{{ $payment->title }}">
    <input type="hidden" name="STATUS_URL" value="mailto:mrb13022001@gmail.com">
    <input type="hidden" name="PAYMENT_URL" value="{{ $success_url }}">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
    <input type="hidden" name="NOPAYMENT_URL" value="{{ $error_url }}">
    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">
    <input type="hidden" name="SUGGESTED_MEMO" value="">
    <input type="hidden" name="BAGGAGE_FIELDS" value="">
    <script>
        const form = document.getElementById('deposit');
        form.submit();
    </script>
</form>
