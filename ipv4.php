import re

class AddressIPv4:
    def __init__(self, address: str):
        self.address = address
        if not self.isValid():
            raise ValueError(f"Invalid IPv4 address: {address}")
    
    def isValid(self) -> bool:
        # Kontrola, zda adresa odpovídá formátu IPv4 (x.x.x.x, kde x je mezi 0-255)
        pattern = r"^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\." \
                  r"(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\." \
                  r"(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\." \
                  r"(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$"
        return re.match(pattern, self.address) is not None

    def set(self, address: str):
        self.address = address
        if not self.isValid():
            raise ValueError(f"Invalid IPv4 address: {address}")
        return self

    def getAsString(self) -> str:
        return self.address

    def getAsInt(self) -> int:
        # Převede adresu na 32-bitové celé číslo
        octets = self.address.split('.')
        return (int(octets[0]) << 24) + (int(octets[1]) << 16) + (int(octets[2]) << 8) + int(octets[3])

    def getAsBinaryString(self) -> str:
        return f"{self.getAsInt():032b}"

    def getOctet(self, number: int) -> int:
        if 1 <= number <= 4:
            return int(self.address.split('.')[number - 1])
        else:
            raise ValueError("Octet number must be between 1 and 4")

    def getClass(self) -> str:
        first_octet = int(self.address.split('.')[0])
        if 1 <= first_octet <= 126:
            return 'A'
        elif 128 <= first_octet <= 191:
            return 'B'
        elif 192 <= first_octet <= 223:
            return 'C'
        elif 224 <= first_octet <= 239:
            return 'D'
        elif 240 <= first_octet <= 255:
            return 'E'
        else:
            return 'Unknown'

    def isPrivate(self) -> bool:
        octets = list(map(int, self.address.split('.')))
        return (octets[0] == 10 or
                (octets[0] == 172 and 16 <= octets[1] <= 31) or
                (octets[0] == 192 and octets[1] == 168))


try:
    addr1 = AddressIPv4("192.168.1.1")
    addr2 = AddressIPv4("10.0.0.1")
    addr3 = AddressIPv4("172.16.0.1")
    addr4 = AddressIPv4("255.255.255.255")

    print(f"Address 1: {addr1.getAsString()}")
    print(f"Is valid: {addr1.isValid()}")
    print(f"As Integer: {addr1.getAsInt()}")
    print(f"As Binary String: {addr1.getAsBinaryString()}")
    print(f"First Octet: {addr1.getOctet(1)}")
    print(f"Class: {addr1.getClass()}")
    print(f"Is Private: {addr1.isPrivate()}")
    print()

    print(f"Address 2: {addr2.getAsString()}")
    print(f"Is valid: {addr2.isValid()}")
    print(f"As Integer: {addr2.getAsInt()}")
    print(f"As Binary String: {addr2.getAsBinaryString()}")
    print(f"Class: {addr2.getClass()}")
    print(f"Is Private: {addr2.isPrivate()}")
    print()

    print(f"Address 3: {addr3.getAsString()}")
    print(f"Class: {addr3.getClass()}")
    print(f"Is Private: {addr3.isPrivate()}")
    print()

    print(f"Address 4: {addr4.getAsString()}")
    print(f"Is valid: {addr4.isValid()}")
    print(f"As Integer: {addr4.getAsInt()}")
    print(f"As Binary String: {addr4.getAsBinaryString()}")
    print(f"Class: {addr4.getClass()}")
    print(f"Is Private: {addr4.isPrivate()}")

except ValueError as e:
    print(e)
