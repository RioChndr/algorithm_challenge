import sys

def get_first_max_occuring_char(str):
    char_list = dict()
    max_char_count = 0
    max_char = ''
    
    for i in str:
        if i in char_list:
            char_list[i] += 1
            
            if char_list[i] > max_char_count:
                max_char = i
                max_char_count = char_list[i]
        else:
            char_list[i] = 1
            
    return max_char

print(get_first_max_occuring_char(sys.argv[1]))
