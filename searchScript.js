var domains = [];
for (var i = 0; i < response.length; i++) {
  let domain = response[i]["domain"]
  domains += domain
  console.log(domain)
}
