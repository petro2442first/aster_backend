const calcBlock = document.querySelector('.calculator');
// const rangeInput = document.querySelector('.main__calculator-block input[type=range]');
const initialValueInput = document.querySelector('#calc-value');
const result = document.querySelector('#calc-result');
const selectedCase = document.querySelector('#calc-select-tariff');
// const textMin = document.querySelector('.rangeWrapper .values .min');
// const textMax = document.querySelector('.rangeWrapper .values .max');

const inputField = document.querySelector('#calc-value');
const termField = document.querySelector('#calc-days');

const config = {
    standard: {
        name: 'standard',
        primaryColor: 'rgb(50 255 135 / 31%)',
        min: 0,
        max: 999,
        currency: '$',
        formula: null,
        term: 30,
        percent: 0.01
    },
    optima: {
        name: 'optima',
        primaryColor: 'rgb(142 225 255 / 52%)',
        min: 0,
        max: 2999,
        currency: '$',
        formula: null,
        term: 45,
        percent: 0.03
    },
    ultra: {
        name: 'ultra',
        primaryColor: 'rgb(255 164 220 / 39%)',
        min: 0,
        max: 9999,
        currency: '$',
        formula: null,
        term: 60,
        percent: 0.07
    },
    personal: {
        name: 'personal',
        primaryColor: 'rgb(255 169 58 / 38%)',
        min: 0,
        max: 30000,
        currency: '$',
        formula: null,
        term: 75,
        percent: 0.18
    },
    active: 'standard'
}

// calcBlock.style.background = config.standard.primaryColor;
result.textContent = ((config.standard.min * config.standard.percent) * config.standard.term).toFixed(2);


const formatResult = cfg => {
    // calcBlock.style.background = cfg.primaryColor;
    initialValueInput.value = cfg.min;

    // initialValueInput.setAttribute('min', cfg.min);
    initialValueInput.setAttribute('max', cfg.max);




    termField.setAttribute('min', 1);
    termField.setAttribute('max', cfg.term);

    termField.value = cfg.term;

    result.textContent = ((cfg.min * cfg.percent) * termField.value).toFixed(3);
}

const calculateResult = (value, tariff) => (value * tariff.percent) * termField.value;



selectedCase.addEventListener('change', e => {
    const tariff = e.target.value;

    formatResult(config[tariff]);
    config.active = tariff;
})

inputField.addEventListener('change', e => {
    const value = e.target.value;
    result.textContent = calculateResult(value, config[config.active]).toFixed(2);
})


inputField.addEventListener('input', e => {
    e.preventDefault();
    var value = e.target.value.replace(/[^\d]+/g,'');

    const min = +inputField.getAttribute('min');
    const max = +inputField.getAttribute('max');
    /*if (e.target.value < min) {
        e.target.value = min
    } else*/ if (e.target.value > max) {
        e.target.value = max
    } else {
        e.target.value = value
    }
    result.textContent = calculateResult(inputField.value, config[config.active]).toFixed(2);
})

termField.addEventListener('input', e => {
    e.preventDefault();
    const lastAddedNumber = e.target.value[e.target.value.length - 1];

    var value = e.target.value.replace(/[^\d]+/g,'');

    const min = +termField.getAttribute('min');
    const max = +termField.getAttribute('max');


    /*if (e.target.value < min) {
        e.target.value = min;
    } else*/ if (e.target.value > max) {
        e.target.value = max;
    } else {
        e.target.value = value;
    }


    result.textContent = calculateResult(inputField.value, config[config.active]).toFixed(2);
})


// Ref link copy

const reflink = document.querySelector('.referral-link');

reflink.addEventListener('click', e => {
    alert('Copied!')
    const input = document.querySelector('#ref_link');
    input.select();
    document.execCommand("copy");

    reflink.classList.add('success');

    setTimeout(() => reflink.classList.remove('success'), 2000)
})
