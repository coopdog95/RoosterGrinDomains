

var domains = [];
for (var i = 0; i < response.length; i++) {
  let domain = response[i]["domain"]
  domains.push(domain)
  // console.log(domain)
}

function findMatches(wordToMatch, domains) {
  return domains.filter(domain => {
    const regex = new RegExp(wordToMatch, 'gi');
    return domain.match(regex)
  });
}
function displayMatches() {
  const domainsArray = findMatches(this.value, domains);
  console.log(domainsArray);
  const html = domainsArray.map(domain => {
    return `
      <div class="domain-container">
        <h3>${domain}</h3>
      </div>
    `
  }).join('');
  matchingDomains.innerHTML = html;
}

const searchInput = document.querySelector('.search-bar');
const matchingDomains = document.querySelector('.matchingDomains');

searchInput.addEventListener('keyup', displayMatches);
