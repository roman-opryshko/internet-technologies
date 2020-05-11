db.duty.insertMany([
{shift:"first", date:"16.04.2020", nurses:["Ivanova", "Petrova"], department:"dep1", wards:[1,3,6]},
{shift:"second", date:"17.04.2020", nurses:"Sidorova", department:"dep2", wards:2},
{shift:"first", date:"18.04.2020", nurses:["Sidorova", "Ivanova"], department:"dep2", wards:3},
{shift:"third", date:"19.04.2020", nurses:["Sidorova", "Ivanova", "Petrova"], department:"dep3", wards:[2,3]}
])