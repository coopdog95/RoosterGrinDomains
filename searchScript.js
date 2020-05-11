

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
  if(this.value.length === 0) {
    matchingDomains.classList.add("hidden");
    originalDomains.classList.remove("hidden");
    return
  } else {
    matchingDomains.classList.remove("hidden");
    originalDomains.classList.add("hidden");
  }
  const wordsArray = this.value.split(" ");
  const domainsArray = findMatches(this.value, domains);
  console.log(domainsArray);
  const html = domainsArray.map(domain => {
    const regex = new RegExp(this.value, 'gi');
    const d = domain.replace(regex, `<span class="foundword">${this.value}</span>`);
    return `
      <div class="domain-container">
        <h3>${d}</h3>
      </div>
      <hr>
    `
  }).join('');
  matchingDomains.innerHTML = html;
}

const searchInput = document.querySelector('.search-bar');
const matchingDomains = document.querySelector('.matchingDomains');
const originalDomains = document.querySelector('.originalDomains');

searchInput.addEventListener('keyup', displayMatches);
