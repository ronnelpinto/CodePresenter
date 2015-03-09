# CodePresenter
BE CSE Final Year project

Code beautifier and formatter to consistently present code along with text blocks across different platforms and different screen resolutions.

  API calls for the three functions are: 
  
  For C:
  c_beautify(source_code, options)
  
  For Java:
  java_beautify(source_code, options)

  For Python:
  python_beautify(source_code, options)
  
Options needs to be passed as a JSON object. 

The config rules presently supported are:

"indent_size"
"indent_char"
"space_before_conditional"
"braces_on_own_line"
"space_after_anon_function"


Example call :
c_beautify(source_code, { "indent_size": "6", "indent_char":'\t', "space_before_conditional":"true", "braces_on_own_line":"true", "space_after_anon_function":"false" })
