<link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1/dist/css/bootstrap-dark.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js" type="module"></script>

<script type="module">
    import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
    const opts = {
        onSelectItem: console.log,
    };
    var src = [];
    for (let i = 0; i < 50; i++) {
        src.push({
            title: "Option " + i,
            id: "opt" + i,
            data: {
                key: i,
            },
        });
    }
    Autocomplete.init("input.autocomplete", {
        items: src,
        valueField: "id",
        labelField: "title",
        highlightTyped: true,
        onSelectItem: console.log,
    });
    document.getElementById("enableButton").addEventListener("click", (e) => {
        e.preventDefault();
        const el = document.getElementById("autocompleteInput");
        const inst = Autocomplete.getInstance(el);
        if (inst.isDisabled()) {
            inst.enable();
        } else {
            inst.disable();
        }
    });
    // We can use regular objects as source and customize label
    new Autocomplete(document.getElementById("autocompleteRegularInput"), {
        items: {
            opt_some: "Some",
            opt_value: "Value",
            opt_here: "Here is a very long element that should be truncated",
            opt_dia: "�a�a"
        },
        onRenderItem: (item, label) => {
            return label + " (" + item.value + ")";
        },
    });
    new Autocomplete(document.getElementById("autocompleteDatalist"), opts);
    new Autocomplete(document.getElementById("autocompleteRemote"), opts);
    new Autocomplete(document.getElementById("autocompleteLiveRemote"), opts);
</script>
<style>
    /* highlightTyped use mark */
    .autocomplete-menu mark {
        text-decoration: underline;
        background: none;
        color: currentColor;
        padding: 0;
    }

    /* Optional nicer scrollbars */
    .autocomplete-menu {
        --scroller-color: 0, 0%;
        --scroller-color-lightness: 80%;
        --scroller-bg-lightness: 90%;
        --scroller-hover-factor: 0.8;
        --scroller-thumb: hsl(var(--scroller-color), var(--scroller-color-lightness));
        /* Replicate hover for webkit */
        --scroller-thumb-hover: hsl(var(--scroller-color), calc(var(--scroller-color-lightness) * var(--scroller-hover-factor)));
        --scroller-background: hsl(var(--scroller-color), calc(var(--scroller-bg-lightness)));
        scrollbar-color: var(--scroller-thumb) var(--scroller-background);
        scrollbar-width: thin;
    }

    .autocomplete-menu::-webkit-scrollbar {
        width: 8px;
    }

    .autocomplete-menu::-webkit-scrollbar-track {
        background: var(--scroller-background);
    }

    .autocomplete-menu::-webkit-scrollbar-thumb {
        background: var(--scroller-thumb);
    }

    .autocomplete-menu::-webkit-scrollbar-thumb:hover {
        background: var(--scroller-thumb-hover);
    }
</style>

<div class="container">
    <h1>Demo</h1>
    <form class="needs-validation" novalidate method="get" action="https://vercel-dumper.vercel.app/">
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteInput" class="form-label">Type something 1</label>
                <input type="text" class="form-control autocomplete" id="autocompleteInput" placeholder="Type something" />
            </div>
            <div class="col-md-4">
                <button id="enableButton">Enable/disable</button>
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteInputZero" class="form-label">Type something 2 (zero threshold)</label>
                <input type="text" class="form-control autocomplete" id="autocompleteInputZero" data-suggestions-threshold="0" placeholder="Type something" />
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteInputDisabled" class="form-label">Type something 3 (disabled)</label>
                <input type="text" class="form-control autocomplete" id="autocompleteInputDisabled" placeholder="Type something" disabled />
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteInputReadonly" class="form-label">Type something 4 (readonly)</label>
                <input type="text" class="form-control autocomplete" id="autocompleteInputReadonly" placeholder="Type something" readonly />
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteRegularInput" class="form-label">Regular array 5</label>
                <input type="text" class="form-control" id="autocompleteRegularInput" placeholder="Type something" />
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteFullWidthInput" class="form-label">Full width 6</label>
                <input type="text" class="form-control autocomplete" id="autocompleteFullWidthInput" data-full-width="true" placeholder="Type something" />
            </div>
        </div>
        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteDatalist" class="form-label">Pick from datalist 7</label>
                <input type="text" class="form-control" id="autocompleteDatalist" data-datalist="list-timezone" placeholder="Type something" />

                <datalist id="list-timezone">
                    <option value="asia_aden">Asia/Aden</option>
                    <!-- we can use the value attribute -->
                    <option>Asia/Aqtau</option>
                    <option>Asia/Baghdad</option>
                    <option>Asia/Barnaul</option>
                    <option>Asia/Chita</option>
                    <option>Asia/Dhaka</option>
                    <option>Asia/Famagusta</option>
                    <option>Asia/Hong_Kong</option>
                    <option>Asia/Jayapura</option>
                    <option>Asia/Kuala_Lumpur</option>
                    <option>Asia/Jakarta</option>
                </datalist>
            </div>
        </div>

        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <label for="autocompleteRemote" class="form-label">Pick from remote 8</label>
                <input type="text" class="form-control" id="autocompleteRemote" data-server="demo.json" placeholder="Type something" />
            </div>
        </div>

        <div class="row mb-3 g-3">
            <div class="col-md-4">
                <select name="" id="related_field">
                    <option value="Choose">Choose</option>
                    <option value="Me">Me</option>
                    <option value="Or">Or</option>
                    <option value="Not">Not</option>
                </select>
                <label for="autocompleteLiveRemote" class="form-label">Pick from remote 9 (live + related)</label>
                <input type="text" class="form-control" id="autocompleteLiveRemote" data-server="https://jsonplaceholder.typicode.com/users" data-live-server="true" data-value-field="id" data-label-field="name" data-server-params='{"related":"related_field"}' placeholder="Type something" />
            </div>
        </div>

        <div class="mb-4">
            <label for="ice-cream-choice">A datalist, for comparison 10</label>
            <input list="ice-cream-flavors" id="ice-cream-choice" name="ice-cream-choice">

            <datalist id="ice-cream-flavors">
                <option value="Chocolate">
                <option value="Coconut">
                <option value="Mint">
                <option value="Strawberry">
                <option value="Vanilla">
            </datalist>
        </div>

        <input type="reset" value="Reset" class="btn btn-outline-dark" />
        <button class=" btn btn-primary" type="submit">Submit form</button>

        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
        <br /><!-- add a bit of space -->
    </form>
</div>
<footer style="position: fixed; bottom: 0; left: 0; right: 0; padding: 1em; background: #eee">
    <div class="container">
        <input type="search" class="form-control autocomplete" id="autocompleteBottomInput" placeholder="Type something" />
    </div>
</footer>
