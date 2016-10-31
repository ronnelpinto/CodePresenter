###!C:\\Python27\\python.exe
import sys
import autopep8

content = open(sys.argv[1], 'r').read()
options=autopep8.parse_args([''])
options.indent_size=int(sys.argv[2])
options.max_line_length=int(sys.argv[3])
sys.stdout.write(str(autopep8.fix_code(str(content), options)))
