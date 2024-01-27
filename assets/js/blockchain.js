const walletButton = document.getElementById("walletButton");
if (!window.ethereum) {
  walletButton.innerHTML = "Install Metamask";
  walletButton.className = "btn btn-sm btn-danger btn-disabled";
}

async function connect() {
  if (window.ethereum) {
    await window.ethereum.request({ method: "eth_requestAccounts" });
    window.web3 = new Web3(window.ethereum);
    const accounts = await web3.eth.getAccounts();
    if (accounts.length > 0) {
      const address = accounts[0];
      walletButton.innerHTML = address.slice(0, 6) + "..." + address.slice(-4);
      walletButton.className = "btn btn-sm btn-warning disabled";
    } else {
      alert("No Ethereum accounts found.");
    }
  } else {
    alert("No wallet");
  }
}
