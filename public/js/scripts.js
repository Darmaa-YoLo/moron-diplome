const getValues = (id) => {
    return {
        user_id: id,
        title: document.getElementById('title').value,
        description: document.getElementById('description').value,
        creator: document.getElementById('creator').value,
        executor: document.getElementById('executor').value,
        manager: document.getElementById('manager').value,
        start_date: document.getElementById('start_date').value,
        end_date: document.getElementById('end_date').value
    }
}

const calculateLoc = async (id) => {
    var totalLinesOfCode = document.getElementById('loc').value
    axios.get
    var mode, model, effort, time, staffs

    if (totalLinesOfCode >= 2 && totalLinesOfCode <= 50) {
        mode = 'Organic'
        model = {
            a: 2.4,
            b: 1.05,
            c: 2.5,
            d: 0.38,
        }
    }
    else if (totalLinesOfCode > 50 && totalLinesOfCode <= 300) {
        mode = 'Semi-detached'
        model = {
            a: 3.0,
            b: 1.12,
            c: 2.5,
            d: 0.35,
        }
    }
    else if (totalLinesOfCode > 300) {
        mode = 'Embedded'
        model = {
            a: 3.6,
            b: 1.20,
            c: 2.5,
            d: 0.32,
        }
    }

    effort = Math.pow(totalLinesOfCode, model.b) * model.a
    time = Math.pow(effort, model.d) * model.c
    staffs = effort / time

    var results = `
        Энэ төсөл нь ${mode} төлөвтэй
        Хүн сар = ${effort.toFixed(3)} хүн-сар,
        Шаардагдах хугацаа = ${time.toFixed(5)} сар,
        Дундаж шаардагдах хүн хүч = ${Math.ceil(staffs)} хүн
        `
    document.getElementById('locResults').innerText = results

    var data = getValues(id)
    var res = await fetch('/api/loc', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: "same-origin",
        body: JSON.stringify({
            ...data,
            mode: mode,
            effort: effort.toFixed(3),
            time: time.toFixed(5),
            staffs: Math.ceil(staffs)
        })
    })
}

const calculateUseCase = async (id) => {
    var simpleUC = document.getElementById('simpleUseCase').value
    var averageUC = document.getElementById('averageUseCase').value
    var complexUC = document.getElementById('complexUseCase').value
    var uucw = simpleUC * 5 + averageUC * 10 + complexUC * 15

    var simpleActors = document.getElementById('simpleActors').value
    var averageActors = document.getElementById('averageActors').value
    var complexActors = document.getElementById('complexActors').value
    var uaw = simpleActors * 1 + averageActors * 2 + complexActors * 3

    var t1 = Number(document.getElementById('t1').value)
    var t2 = Number(document.getElementById('t2').value)
    var t3 = Number(document.getElementById('t3').value)
    var t4 = Number(document.getElementById('t4').value)
    var t5 = Number(document.getElementById('t5').value)
    var t6 = Number(document.getElementById('t6').value)
    var t7 = Number(document.getElementById('t7').value)
    var t8 = Number(document.getElementById('t8').value)
    var t9 = Number(document.getElementById('t9').value)
    var t10 = Number(document.getElementById('t10').value)
    var t11 = Number(document.getElementById('t11').value)
    var t12 = Number(document.getElementById('t12').value)
    var t13 = Number(document.getElementById('t13').value)
    var tf = (2 * t1) + t2 + t3 + t4 + t5 + (t6 * 0.5) + (t7 * 0.5) + (t8 * 2) + t9 + t10 + t11 + t12 + t13
    var tcf = 0.6 + (tf / 100)

    var e1 = Number(document.getElementById('e1').value)
    var e2 = Number(document.getElementById('e2').value)
    var e3 = Number(document.getElementById('e3').value)
    var e4 = Number(document.getElementById('e4').value)
    var e5 = Number(document.getElementById('e5').value)
    var e6 = Number(document.getElementById('e6').value)
    var e7 = Number(document.getElementById('e7').value)
    var e8 = Number(document.getElementById('e8').value)
    var ef = (e1 * 1.5) + (e2 * 0.5) + e3 + (e4 * 0.5) + e5 + (e6 * 2) + (e7 * -1) + (e8 * -1)
    var ecf = 1.4 + (-0.03 * ef)

    var ucp = (uucw + uaw) * tcf * ecf
    var results = `Энэ төслийн UCP=${ucp}`
    document.getElementById('useCaseResult').innerText = results

    var data = getValues(id)
    var res = await fetch('/api/usecase', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: "same-origin",
        body: JSON.stringify({
            ...data,
            ucp: ucp
        })
    })
}

const calculateFunctionPoint = async (id) => {
    var eiSimple = Number(document.getElementById('eiSimple').value) * 3
    var eiAverage = Number(document.getElementById('eiAverage').value) * 4
    var eiComplex = Number(document.getElementById('eiComplex').value) * 6

    var eoSimple = Number(document.getElementById('eoSimple').value) * 4
    var eoAverage = Number(document.getElementById('eoAverage').value) * 5
    var eoComplex = Number(document.getElementById('eoComplex').value) * 7

    var eqSimple = Number(document.getElementById('eqSimple').value) * 3
    var eqAverage = Number(document.getElementById('eqAverage').value) * 4
    var eqComplex = Number(document.getElementById('eqComplex').value) * 6

    var ilfSimple = Number(document.getElementById('ilfSimple').value) * 7
    var ilfAverage = Number(document.getElementById('ilfAverage').value) * 10
    var ilfComplex = Number(document.getElementById('ilfComplex').value) * 15

    var eifSimple = Number(document.getElementById('eifSimple').value) * 5
    var eifAverage = Number(document.getElementById('eifAverage').value) * 7
    var eifComplex = Number(document.getElementById('eifComplex').value) * 10

    var fp1 = Number(document.getElementById('fp1').value)
    var fp2 = Number(document.getElementById('fp2').value)
    var fp3 = Number(document.getElementById('fp3').value)
    var fp4 = Number(document.getElementById('fp4').value)
    var fp5 = Number(document.getElementById('fp5').value)
    var fp6 = Number(document.getElementById('fp6').value)
    var fp7 = Number(document.getElementById('fp7').value)
    var fp8 = Number(document.getElementById('fp8').value)
    var fp9 = Number(document.getElementById('fp9').value)
    var fp10 = Number(document.getElementById('fp10').value)
    var fp11 = Number(document.getElementById('fp11').value)
    var fp12 = Number(document.getElementById('fp12').value)
    var fp13 = Number(document.getElementById('fp13').value)
    var fp14 = Number(document.getElementById('fp14').value)

    var ufp = eiSimple + eiAverage + eiComplex + eoSimple + eoAverage + eoComplex + eqAverage + eqComplex + eqSimple + ilfSimple + ilfAverage + ilfComplex + eifSimple + eifAverage + eifComplex
    var totalFp = fp1 + fp2 + fp3 + fp4 + fp5 + fp6 + fp7 + fp8 + fp9 + fp10 + fp11 + fp12 + fp13 + fp14
    var caf = 0.65 + (0.01 * totalFp)
    var fp = (ufp * caf)

    var results = `Энэ төслийн FP=${fp}`
    document.getElementById('functionResults').innerText = results


    var data = getValues(id)
    var res = await fetch('/api/function', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        credentials: "same-origin",
        body: JSON.stringify({
            ...data,
            fp: fp
        })
    })
}