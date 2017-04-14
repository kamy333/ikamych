<section class="artistpage">
    <div class="search">
        <h1>Artist Directory</h1>
        <label>search: </label>
        <input ng-model="query" placeholder="Search for artists" autofocus>

        <label class="formgroup">by:
            <select ng-model="artistOrder">
                <option value="name">Name</option>
                <option value="reknown">Reknown</option>
            </select>
        </label>

        <label class="formgroup">
            <input type="radio" ng-model="direction" name="direction" checked>
            ascending
        </label>
        <label class="formgroup">
            <input type="radio" ng-model="direction" name="direction" value="reverse">
            descending
        </label>

    </div>
    <ul class="artistlist" ng-show="query">
        <li ng-animate="animate" class="artist cf" ng-repeat="item in artists | filter: query | orderBy: artistOrder:direction">
            <a href="#/details/{{artists.indexOf(item)}}">
                <img ng-src="images/{{item.shortname}}_tn.jpg" alt="Photo of {{item.name}}">
                <div class="info">
                    <h2>{{item.name}}</h2>
                    <h3>{{item.reknown}}</h3>
                </div>
            </a>
        </li>
    </ul>
</section>