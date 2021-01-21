<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        const a = {
            a: 1,
            b: 2,
            c: 3,
            aInternal: 0,
            set a(val) {
                this.aInternal = val;
                console.log(this.a);
            },
            get a() {
                return this.aInternal;
            }
        };
        var b = [a];
        console.log(JSON.parse(JSON.stringify(b)));
        b[0]["a"] = 3;
    </script>
</body>
</html>